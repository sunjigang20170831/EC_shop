<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class safetyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = session('adminuser');
        $res = DB::table('usermes')->where('uid',$id->id)->get();
        return view('home.person.safety',['res'=>$res]);
    }

    public function show()
    {
        return view('home.person.password');
    }

    
}
