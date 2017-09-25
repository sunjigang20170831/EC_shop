<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ajaxdemo');
    }

    public function doGet(Request $request)
    {

        $config = DB::table('config')->first();
        echo json_encode($config);
    }

     public function doPost(Request $request)
    {
        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }
}
