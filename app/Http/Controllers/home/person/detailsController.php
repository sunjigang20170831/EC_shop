<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //商品内容页
    public function show($id)
    {
            $list = DB::table('goods')->where('id',$id)->first();
            $uid = $list->uid;
            //dd($uid);
            $arr = DB::table('goods')->where('uid', $uid)->where('status','=','1')->get();
             //$res = DB::table('goods')->where(['uid'=>$uid, 'status'=>1])->value('id');
             // $li = DB::table('liuyan')->where('sid', $res)->get();
              $li = DB::table('liuyan')->get();
            $hot = DB::table('goods')->where('uid',$uid)->where(['hot'=>1,'status'=>1])->get();
            
                $hi = DB::table('huifu')->get();
            //dd($hot);
            return view('home.usershop.details', ['list'=>$list, 'arr'=>$arr, 'li'=>$li,'hot'=>$hot, 'hi'=>$hi]);
        }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
  
}
