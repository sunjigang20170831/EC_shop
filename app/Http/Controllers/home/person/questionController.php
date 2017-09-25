<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.person.question');

    }

    public function answer(Request $request)
    {		
    	$arr = $request->only('wenti','answer','wenti1','answer1');
    	$wenti = $request->wenti;
       	$answer = $request->answer;
       	$wenti1 = $request->wenti1;
       	$answer1 = $request->answer1;
    	$id = session('adminuser');

    	if($answer!= "" || $answer1!= "")
    	{
    		$res = DB::table('usermes')->where('uid',$id->id)->update($arr);
    		if($res){
    		return redirect('home/question')->with('msg', '问题设置成功');
    		}
    	    }else{
    		return redirect('home/question')->with('msg', '问题答案不能为空');
    	}

    	
    }
  

}    