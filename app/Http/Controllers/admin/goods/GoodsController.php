<?php

namespace App\Http\Controllers\admin\goods;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Org\XDB_R;
use App\Org\PSCWS4;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //显示商品列表
    public function index(Request $request)
    {
        //dd($request);
        $arr = $request->input('shopname');
        if($arr){
            $ob = DB::table('goods')->where('shopname', 'like', "%$arr%");
            $ob->where('status', '=', 1);
            // 分页
            $list = $ob->paginate(5);
            if($list == 'null'){
                return redirect('admin/goods')->with('error', '对不起没有你要搜索的商品');
            }else{
                return view('admin.goods.list',['list'=>$list]);
            }
            
        }else{
            // dd($arr['shopname']);
            //查询商品表
            $ob = DB::table('goods');
            //dd($ob);
            //添加where条件判断商品审核是否通过
            $ob->where('status', '=', 1);
            //分页
            $list = $ob->paginate(5);
            return view('admin.goods.list',['list'=>$list]);
            //添加where条件判断商品审核是否通过
            //$ob->where('status', '=', 1);
            //分页
            //$list = $ob->paginate(5);
        }    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //删除商品
    public function destroy($id)
    {
        //执行删库
        $ret = DB::table('fenci')->where('goods_id',$id)->delete();
        DB::table('liuyan')->where('sid', '=', $id)->delete();
        DB::table('huifu')->where('sid', '=', $id)->delete();
        //dd($ret);

        $res = DB::table('goods')->where('id',$id)->delete();
        if($res > 0){
        	return redirect('admin/goods')->with('msg', '删除成功');
        }else{
        	//判断此行数据是否删除
        	return redirect('admin/goods')->with('error', '删除失败');
        }
        
    }


    //商品加精
    public function doHot(Request $request, $id)
    {   
        //查询要加精的数据
        $hot = DB::table('goods')->where('id', $id)->first();
        //创建一个标记
        $flag = null;
        //标记与数据库里的信息取反
        if($hot->hot == 1){

            $flag = 0;
        }else{
            $flag = 1;
        }

        //通过取反后标记修改数据库
        $res = DB::table('goods')->where('id', $id)->update(['hot' => $flag]);

        //前台显示加精成功与否
        if($res > 0){
            return redirect('admin/goods')->with('msg', '加精成功');
        }else{
            return redirect('admin/goods')->with('error', '加精失败');
        }
    }

    //显示未审核的商品列表
     public function indexAuditing()
    {
        //
        //
        $ob = DB::table('goods');
        //商品状态是否为未审核
        $ob->where('status', '=', 0);
        $list = $ob->paginate(5);
        return view('admin.goods.auditingList',['list'=>$list]);
    }

    //审核商品操作
    public function doAuditing(Request $request, $id)
    {   
        //查询需要审核的商品的数据
        $status = DB::table('goods')->where('id', $id)->first();
        //创建一个标记
        $flag = null;
        //取反
        if($status->status == 0){
            $flag = 1;
        }
        //修改商品状态
        $res = DB::table('goods')->where('id', $id)->update(['status' => $flag]);

        //判断是否审核成功
        if($res > 0){
            return redirect('admin/goodsAuditing')->with('msg', '审核成功');
        }else{
            return redirect('admin/goodsAuditing')->with('error', '审核失败');
        }
    }

    //拒绝审核操作
    public function destroyAuditing($id)
    {
        //
        //拒绝审核后从数据库删除
        $res = DB::table('goods')->where('id',$id)->delete();
        //判断是否删库成功
        if($res > 0){
            return redirect('admin/goodsAuditing')->with('msg', '拒绝审核成功');
        }else{
            return redirect('admin/goodsAuditing')->with('error', '拒绝审核失败');
        }
    }


    //显示商品详情
    public function indexShop($id)
    {
        //echo 11111;die;
        //查询商品表
        $list = DB::table('goods')->where('id',$id)->first();
        //查询此商品的发布用户
        $user = DB::table('user')->where('id',$list->uid)->first();
        
        return view('admin.goods.shopList',['list'=>$list, 'user'=>$user]);
    }

    //显示商品分词列表
    public function fenciList(Request $request)
    {
        $arr = $request->input('word');
        if($arr){
            $ob = DB::table('fenci')->where('word', 'like', "%$arr%");
            //dd($ob);
            $list = $ob->paginate(10);
            if($list == 'null'){
                return redirect('admin/goodsFenci')->with('error', '没有你要搜索的分词');
            }else{
                return view('admin.goods.fenciList',['list'=>$list]);
            }
        }else{
        //查询商品分词表
            $ob = DB::table('fenci');
            //分页
            $list = $ob->paginate(10);
            return view('admin.goods.fenciList',['list'=>$list]);
        }

    }

    //分词操作
    public function fenci()
    {
        //分词之前清空所有分词
        DB::table('fenci')->delete();
        //查询上架的商品
        $list = DB::table('goods')->where('status','=',1)->get();
        if(!$list){
            return redirect('admin/goodsFenci')->with('error', '没有商品可分词');
        }
            //遍历商品的名字进行分词
            foreach($list as $k => $v){
                // 实例化
                //$arr = [];
                $str = $v->shopname;
                //dd($str);
                $cws = new PSCWS4();
                //设置字符集
                $cws->set_charset('utf8');
                //设置词典
                $cws->set_dict('etc/dict.utf8.xdb');
                //设置utf8规则
                $cws->set_rule('etc/rules.utf8.ini');
                //忽略标点符号
                $cws->set_ignore(true);
                //传递字符串
                $cws->send_text($str);
                //获取权重最高的前十个词
                $ret = $cws->get_tops(5);
                //关闭
                $cws->close();
                // 返回结果
                //dd($ret);
                
                //遍历每个商品的分词存入数据库
                foreach($ret as $k1 => $v1){
                    //$arr['word'] = $v1['word'];
                    //$arr['id'] = $v['id'];
                    //吧不需要存入数据库的字段删除
                    unset($v1['times']);
                    unset($v1['weight']);
                    unset($v1['attr']);
                    //获取商品id
                    $v1['pid']=$v->pid;
                    $v1['goods_id']= $v->id;
                    //$arr = unset($arr['times']);
                    //dd($v1);
                    $ob = DB::table('fenci')->insert($v1);
                    //dd($ob);
                }
            }
        if($ob == true){
            return redirect('admin/goodsFenci')->with('msg', '分词成功');
        }else{
            return redirect('admin/goodsFenci')->with('error', '分词失败');
        }
    }
}
