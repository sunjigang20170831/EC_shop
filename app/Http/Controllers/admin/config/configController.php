<?php

namespace App\Http\Controllers\admin\config;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class configController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //echo 111;die;
        $list = DB::table('config')->first();
        //dd($list);
        return view('admin.config.config', ['list'=>$list]);
    }

    
    public function update(Request $request, $id)
    {
        //
        //echo 111;die;
        //dd($request);
        $arr = $request->except('_token','_method');
        //dd($arr);
        if ($request->hasFile('logo')) {
            // 判断文件是否有效
            if ($request->file('logo')->isValid()) {
                //生成上传文件对象
                $file = $request->file('logo');
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //移动文件
            $file->move('./home/uplodas', $picname);
            $arr['logo'] = $picname;
            //dd($arr);
            // dd($file->getError());
            if($file->getError() > 0){
                return redirect('admin/config')->with('error', '修改失败');
            }else{
                //判断是否输入标题
                if(!$arr['title']){
                unset($arr['title']);
                //var_dump($arr);
                } 
                //判断是否输入关键字
                if(!$arr['keywords']){
                    //var_dump($arr);
                    unset($arr['keywords']);
                }
                //判断是否输入描述
                if(!$arr['des']){
                    unset($arr['des']);
                }
                //dd($arr);
                $ob = DB::table('config')->where('id',$id)->update($arr);
                //dd($ob);
                if($ob){
                    return redirect('admin/config')->with('msg', '修改成功');
                }else{
                    return redirect('admin/config')->with('error', '修改失败');
                }
                
                //echo '上传成功';
                //echo "<img src='home/uploads/{$picname}' width='200' height='200'>";
            }
        }else{
            //判断是否输入标题
            if(!$arr['title']){
                $arr = $request->except('_token','_method','title');
                //var_dump($arr);
            } 
            //判断是否输入关键字
            if(!$arr['keywords']){
                //var_dump($arr);
                unset($arr['keywords']);
            }
            //判断是否输入描述
            if(!$arr['des']){
                unset($arr['des']);
            }
            //dd($arr);
            $ob = DB::table('config')->where('id',$id)->update($arr);
            if($ob){
                return redirect('admin/config')->with('msg', '修改成功');
            }else{
                return redirect('admin/config')->with('error', '修改失败');
            }
        }


    }

   
}
