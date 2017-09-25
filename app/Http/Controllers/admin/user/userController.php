<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
          //保存搜索条件
        $where = [];
        //实例化需要的表
        $ob = DB::table('user');
        // dd($request);
        // 判断请求中是否含有name字段
        if($request->has('name')){
            // 获取搜索的条件
            $name = $request->input('name');
            //添加到将要带到分页中的数组
            $where['name'] = $name;
            //给查询语句添加where条件
            $ob->where('name','like','%'.$name.'%');
        }
        //执行分页查询
        $list = $ob->paginate(3);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.user.user', ['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //自定义错误消息格式
        $messages = array(
            'name.required' => '用户名必须填写',
            'name.unique'  => '用户已存在',
             'pass.required' => '密码必须填写'
        );
        $this->validate($request, [
       'name' => 'required|unique:user',
        'pass' => 'required',
    ],$messages);
          $arr = $request->except('_token');
          $arr['utime'] = time();
           $id = DB::table('user')->insertGetId($arr);
        if($id > 0){
            return redirect('admin/user')->with('msg', '添加成功');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //用户详情
    public function show($id)
    {
       
       $ob = DB::table('usermes')->where('uid', $id);
        $list = $ob->first();
        $goods = DB::table('goods')->where('uid', '=', $id)->get();
      if( !$list){
        return redirect('admin/user')->with('msg', '没有此用户信息');
      }

      return view('admin.user.profile',['list'=>$list , 'goods'=>$goods]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $ob = DB::table('user')->where('id', $id);
       $list = $ob->first();

     return view('admin.user.editUser', ['list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $arr = $request->except('_token', '_method');

          $res = DB::table('user')->where('id',$id)->update($arr);
          if($res > 0){
            return redirect('admin/user')->with('msg', '修改成功');
        }else{
            return redirect('admin/user')->with('error', '修改失败');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //执行删除
        $res = DB::table('user')->where('id',$id)->delete();
        if($res > 0){
            return redirect('admin/user')->with('msg', '删除成功');
        }else{
            return redirect('admin/user')->with('error', '删除失败');
        }
    }

//用户商品删除
    public function shopsDele($id)
    {
        $res = DB::table('goods')->where('id',$id)->delete();
        if($res > 0){
            return back();
        }else{
            return back();
        }

    }
    //有注册的用户审核提交
    public function Users(){
         $ob = DB::table('user')->where('shops','1');
     
         $list = $ob->paginate(5);
        
        return view('admin.user.users',['list'=>$list]);
    }
    // 审核用户详情
    public function  showUsers($id)
    {
         $user = DB::table('user')->where('id',$id)->first();
       
       $ob = DB::table('usermes')->where('uid', $id);
        $list = $ob->first();
        if($list){
             return view('admin.user.profiles',['list'=>$list, 'user'=>$user]);
        }else{
             return back()->with('msg', '用户资料不完整！没有相关信息');
        }
      
    }
    //通过审核 2为通过 1为提交到后台审核 0为不通过
    public function OKUsers($id)
    {
        $arr = array(
                'shops' => 2,
                'status' => 1

            );
       $ob = DB::table('user')->where('id',$id)->update($arr);
       if($ob > 0){
         return redirect('admin/users')->with('msg', '审核通过');
       }
    }
    public function NOUsers($id)
    {
         $arr = array(
                'shops' => 3 

            );
       $ob = DB::table('user')->where('id',$id)->update($arr);
       if($ob > 0){
         return redirect('admin/users')->with('msg', '审核不通过');
       }
    }
}
