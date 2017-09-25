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
            $file->move('./home/uploads', $picname);
            $arr['logo'] = $picname;
            // dd($file->getError());
            if($file->getError() > 0){
                return redirect('admin/config')->with('error', '修改失败');
            }else{
                $ob = DB::table('config')->where('id',$id)->update($arr);
                //dd($ob);
                return redirect('admin/config')->with('msg', '修改成功');
                //echo '上传成功';
                //echo "<img src='home/uploads/{$picname}' width='200' height='200'>";
            }
        }
    }

   
}
