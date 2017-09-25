<?php

namespace App\Http\Controllers\admin\type;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
      {   
        //dd($request);
        $arr = $request->input('name');
        if($arr){
            $ob = DB::table('type')->where('name', 'like', "%$arr%");
            $list = $ob->paginate(5);
            if($list == null){
                return redirect('admin/demo/type')->with('error', '对不起没有你搜索分类');
            }else{
                return view('admin.type.list', ['list'=>$list]);
            }
        }else{

            $ob = DB::table('type');
         
            $list = $ob->paginate(5);
            
            return view('admin.type.list', ['list'=>$list]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo 111;die;
        return view('admin.type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //echo 1111;die;
        //dd($request);
        $messages = array(
            'name.required' => '分类名必须填写',
            'name.unique'  => '分类已存在',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'name' => 'required|unique:type',
        ],$messages);
        
        $arr = $request->except('_token');
        $id = DB::table('type')->insertGetId($arr);
        //dd($id);
        if($id > 0){
            return redirect('admin/demo/type')->with('msg', '添加成功');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $type = DB::table('type')->where('id', $id)->first();
        //dd($type);
        return view('admin.type.edit', ['type'=>$type]);
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
        //
        //dd($request);
        $arr = $request->except('_token', '_method');
        $res = DB::table('type')->where('id',$id)->update($arr);
        if($res > 0){
            return redirect('admin/demo/type')->with('msg', '修改成功');
        }else{
            return redirect('admin/demo/type')->with('error', '修改失败');
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
        //
        $list = DB::table('type')->where('pid',$id)->first();
        if(count($list)>0){
            //如果有子分类，不能删除，直接跳转
            return redirect('admin/demo/type')->with('error','要删除这个分类需要先删除此分类下的子分类');
        }
        
        $res = DB::table('type')->where('id',$id)->delete();
        if($res > 0){
            return redirect('admin/demo/type')->with('msg', '删除成功');
        }else{
            return redirect('admin/demo/type')->with('error', '删除失败');
        }
    }

    public function createSon($id)
    {
        //echo 111;die;
        $ob = DB::table('type')->where('id',$id)->first();
        return view('admin.type.addSon',['ob'=>$ob]);
    }

    public function storeSon(Request $request)
    {
        //dd($request);
        //自定义错误消息格式
        $messages = array(
            'name.required' => '分类名必须填写',
            'name.unique'  => '分类已存在',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'name' => 'required|unique:type',
        ],$messages);
        
        $arr = $request->except('_token');
        //dd($arr);
        //获取当前添加的子分类的父分类的信息
        $par = DB::table('type')->where('id',$request->input('pid'))->first();
        // 拼接出path字段
        $arr['path'] = $par->path.','.$arr['pid'];
        //dd($arr);
        // 执行添加
        $id = DB::table('type')->insertGetId($arr);
        //dd($id);
        if($id > 0){
            return redirect('admin/demo/type')->with('msg', '添加成功');
        }
    }
}
