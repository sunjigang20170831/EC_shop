<?php

namespace App\Http\Controllers\admin\zd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class zdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //return view('admin.user.editUser');
           //return 11111;
        
       $list = DB::table('zd')->orderBy('ctime','desc')->paginate(5);
           
           
        
        return view('admin.money.zd',['list'=>$list]);
    }

    public function dodelzd($id)
    {
        //$ad = DB::table('zd')->value('id');
      
        
        DB::table('zd')->where('id',$id)->delete();
        return redirect('/admin/zd');
    }
    public function select(Request $request)
    {
        //dd(111);
         $arr = $request->input('event');
     // dd($arr);
    // $id = session('adminuser')->id;
        $list =  DB::table('zd')->where(['event'=>$arr])->orderBy('ctime','desc')->paginate(5);
         return view('admin.money.zd',['list'=>$list]);
    }
}