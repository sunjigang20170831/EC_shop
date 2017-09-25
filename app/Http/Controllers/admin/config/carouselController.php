<?php

namespace App\Http\Controllers\admin\config;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class carouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ob = DB::table('carousel');
        $list = $ob->paginate(5);
        return view('admin.config.carousel',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.config.addCarousel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request);
        $arr = $request->except('_token','_method');
        //dd($arr);
        if ($request->hasFile('address')) {
            // 判断文件是否有效
            if ($request->file('address')->isValid()) {
                //生成上传文件对象
                $file = $request->file('address');
                //dd($file);
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //dd($ext);
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //dd($picname);
            //移动文件
            $file->move('./home/uplodas', $picname);
            // $address = 
            $arr['address'] = ("/home/uplodas/$picname");
            //dd($arr);
            // dd($file->getError());
            if($file->getError() > 0){
                //echo 11111;die;
                return redirect('admin/carousel/create')->with('error', '添加失败');
            }else{
                //判断是否输入图片名
                //echo 222;die;
                if(!$arr['photoname']){
                $arr = $request->except('_token','_method','photoname');
                //var_dump($arr);
                } 
                //判断是否输入关键字
                
                //dd($arr);
                $ob = DB::table('carousel')->insertGetId($arr);
                //dd($ob);
                if($ob){
                    return redirect('admin/carousel')->with('msg', '添加成功');
                }else{
                    return redirect('admin/carousel')->with('error', '添加失败');
                }
                
                //echo '上传成功';
                //echo "<img src='home/uploads/{$picname}' width='200' height='200'>";
            }
        }else{
            return redirect('admin/carousel/create')->with('error', '添加失败,没有图片上传');
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
        $list = DB::table('carousel')->where('id', $id)->first();
        return view('admin.config.carouselEdit', ['list'=>$list]);
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
        $arr = $request->except('_token','_method');
        //dd($arr);
        if ($request->hasFile('address')) {
            // 判断文件是否有效
            if ($request->file('address')->isValid()) {
                //生成上传文件对象
                $file = $request->file('address');
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //移动文件
            $file->move('./home/uplodas', $picname);
            $arr['address'] = '/home/uplodas/'.$picname;
            //dd($arr);
            if($file->getError() > 0){
                return redirect("admin/carousel/" . $id . "/edit")->with('error', '修改失败');
            }else{
                //判断是否输入图片名
                //dd($arr);
                if(!$arr['photoname']){
                unset($arr['photoname']);
                } 
                //dd($arr);
                $ob = DB::table('carousel')->where('id',$id)->update($arr);
                //dd($ob);
                if($ob){
                    return redirect('admin/carousel')->with('msg', '修改成功');
                }else{
                    return redirect('admin/carousel')->with('error', '修改失败');
                }
                
                //echo '上传成功';
                //echo "<img src='home/uploads/{$picname}' width='200' height='200'>";
            }
        }else{
            //判断是否输入图片名
            if(!$arr['photoname']){
                $arr = $request->except('_token','_method','photoname');
            } 
            
            if(!$arr){
                return redirect("admin/carousel/" . $id . "/edit")->with('error', '修改失败,请填写图片名和图片地址');
            }
            //dd($arr);
            $ob = DB::table('carousel')->where('id',$id)->update($arr);
            if($ob){
                return redirect('admin/carousel')->with('msg', '修改成功');
            }else{
                return redirect('admin/carousel')->with('error', '修改失败');
            }
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
        $ob = DB::table('carousel')->where('id',$id)->delete();
        if($ob){
            return redirect('admin/carousel')->with('msg', '删除成功');
        }else{
            return redirect('admin/carousel')->with('error', '删除失败');
        }
    }
}
