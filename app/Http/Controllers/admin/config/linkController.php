<?php

namespace App\Http\Controllers\admin\config;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class linkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //友情链接列表显示
    public function index()
    {
        //
        //echo 1111;die;
        $list = DB::table('link')->get();
        return view('admin.config.linkList',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //echo 111;die;
        return view('admin.config.addLink');
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
        //dd($request);
        $messages = array(
            'name.required' => '链接名必须填写',
            'name.unique'  => '链接已存在',
            'address.required'=>'链接地址必须填写',
        );
        $this->validate($request, [
            'name' => 'required|unique:link',
            'address'=>'required:link',
        ],$messages);

        $arr = $request->except('_token');
        $id = DB::table('link')->insertGetId($arr);
        //dd($id);
        if($id > 0){
            return redirect('admin/link')->with('msg', '添加成功');
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
        $list = DB::table('link')->where('id',$id)->first();
        return view('admin.config.editLink',['list'=>$list]);
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
        //echo 111;die;
        //dd($request);
        $arr = $request->except('_token', '_method');
        //dd($arr);
        if(!$arr['name']){
            $arr = $request->except('_token', '_method', 'name');
        }
        if(!$arr['address']){
            $arr = $request->except('_token', '_method','address');;
        }
        //dd($arr);
        $res = DB::table('link')->where('id',$id)->update($arr);
        if($res > 0){
            return redirect('admin/link')->with('msg','修改成功');
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
        //echo 111;die;
        $res = DB::table('link')->where('id',$id)->delete();

        if($res > 0){
            return redirect('admin/link')->with('msg', '删除成功');
        }else{
            return redirect('admin/link')->with('error', '删除失败');
        }
    }
}
