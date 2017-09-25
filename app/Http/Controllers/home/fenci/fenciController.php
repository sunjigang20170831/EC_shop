<?php

namespace App\Http\Controllers\home\fenci;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class fenciController extends Controller
{
    

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    //加载搜索页面
    public function showIndex(Request $request)
    {
        //查询分类表
        $list = DB::table('type')->get();
        //去除token
        $arr = $request->except('_token');
        //判断是否输入查找的条件
        if(!$arr['fenci']){
            return redirect('/')->with('msg', '请输入您要查找的商品');
        }
        //查询分词表      
        $ob = DB::table('fenci')->where('word', 'like', '%'.$arr['fenci'].'%')->get();
        if(!$ob){
            //dd($ob);
            return redirect('/')->with('msg', '对不起没有此类商品');die;
        }
        //遍历根据分词表查到的数据查询商品表存入shops空数组中
        foreach($ob as $v){
            $shops[] = DB::table('goods')->where('id',$v->goods_id)->paginate(10);
            //dd($shops);
        }

        //查询分词表
        // $fenci = DB::table('fenci')->get();
        //查询站点表
        $config = DB::table('config')->first();
        $ho = DB::table('goods')->where(['hot'=>1,'status'=>1])->paginate(3);
        
        return view('home.search',['list'=>$list,'arr'=>$arr,'config'=>$config,'shops'=>$shops, 'ho'=>$ho]); 
    }

    public function search(Request $request, $id)
    {
        //dd($request);
        $arr = DB::table('type')->where('id', $id)->first();
        //$arr = $typename->name;
        //dd($arr);
        $list = DB::table('type')->get();
        $type = DB::table('type')->where('pid', '=', $id)->get();
        $config = DB::table('config')->first();
        $ho = DB::table('goods')->where(['hot'=>1,'status'=>1])->paginate(3);
        //dd($ho);
        
        if($type){
            foreach($type as $t){
                $shops[] = DB::table('goods')->where('pid','=' ,$t->id)->paginate(10);;
                
            }
            //dd($shops);
            return view('home.fenleiSearch', ['shops'=>$shops, 'list'=>$list, 'arr'=>$arr, 'config'=>$config, 'ho'=>$ho]);
            
        }else{
            $shops[] = DB::table('goods')->where('pid', '=', $id)->paginate(10);
            //dd($shops);
            return view('home.fenleiSearch', ['shops'=>$shops, 'list'=>$list, 'arr'=>$arr, 'config'=>$config, 'ho'=>$ho]);
        }
    }

    
}
