<?php

namespace App\Http\Controllers;

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
    

    public function doGets(Request $request)
    {
       // $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        $list = DB::table('link')->get();
        echo json_encode($list);
    }

    public function doGoods(Request $request)
    {

        $goods = DB::table('goods')->where('status', '=', 2)->lists('price');
        $ob = 0;
        foreach($goods as $li){
            $ob = $ob+$li;
        }    
        // }
        // //$g = $goods[0]->price;
        echo json_encode($ob);
    }

    public function doAdmin(Request $request)
    {   
        $liu = DB::table('liuyan')->count();
        $user = DB::table('user')->count();
        $link = DB::table('link')->count();

        $list = DB::table('goods')->where('status', '=', 2)->count();
        echo json_encode([$list,$liu,$user,$link]);
    }

}
