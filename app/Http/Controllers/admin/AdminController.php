<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $list = DB::table('goods')->where('status', '=', 1)->where('hot', '=', 1)->get();
       $res = DB::table('suggest')->orderBy('time','desc')->paginate(5);
    	//dd($list);
        return view('admin.index', ['list'=>$list,'res'=>$res]);

    }
    //删除反馈
    public function del($id)
    {	
    	
    	DB::table('suggest')->where('id',$id)->delete();
    	return redirect('admin/demo');
    }
    //查询反馈
    public function select(Request $request)
    {
    	
    	$arr = $request->only('problem');
    	//dd($arr);
    	 $list = DB::table('goods')->where('status', '=', 1)->where('hot', '=', 1)->get();
    	$res = DB::table('suggest')->where('problem',$arr)->orderBy('time','desc')->paginate(5);
    	//$list = DB::table('goods')->where('status', '=', 1)->where('hot', '=', 1)->get();
    	
    	return view('admin.index',['list'=>$list,'res'=>$res]);
    }

}
