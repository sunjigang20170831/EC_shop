<?php

namespace App\Http\Controllers\admin\news;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ob = DB::table('news')
                ->orderBy('time', 'desc');
              
                
        
        $list = $ob->paginate(7);
      
       
       return view('admin.news.list' ,['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('admin.news.newsAdd');
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
              'title.required' => '密码必须填写',
              'content.required'=>'内容必须填写'
         );
        $this->validate($request, [
       'name' => 'required|unique:user',
        'title' => 'required',
        'content' => 'required',
     ],$messages);
           $arr = $request->except('_token');
           $arr['time'] = time();
            $id = DB::table('news')->insertGetId($arr);
         if($id > 0){
            return redirect('admin/news')->with('msg', '添加成功');
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $ob = DB::table('news')->where('id', $id);
       $list = $ob->first();

     return view('admin.news.newsEdit', ['list'=>$list]);
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
         //自定义错误消息格式
        $messages = array(
            'title.required' => '标题名必须填写',
            'name.required'  => '用户名必须填写',
             'content.required' => '内容必须填写'
        );
        $this->validate($request, [
       'name' => 'required',
        'title' => 'required',
        'content' => 'required',
    ],$messages);
         $arr = $request->except('_token', '_method');

          $res = DB::table('news')->where('id',$id)->update($arr);
          if($res > 0){
            return redirect('admin/news')->with('msg', '修改成功');
        }else{
            return redirect('admin/news')->with('error', '修改失败');
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
        $res = DB::table('news')->where('id',$id)->delete();
        if($res > 0){
            return redirect('admin/news')->with('msg', '删除成功');
        }else{
            return redirect('admin/news')->with('error', '删除失败');
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
}
