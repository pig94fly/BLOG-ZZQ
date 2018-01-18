<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Model\Article;
use App\Http\Model\Leaveword;
use App\Http\Model\Usermsg;
use App\Http\Model\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()       //文章阅读
    {
      if ($_GET['id']=='') {
        return redirect('/');
      }
      $data=Article::find($_GET['id']);
      $data->art_view++;
      $data->save();
      $leaveword=Leaveword::where('art_id',$_GET['id'])->get();
      //$recommend=Article::where('cate_id',$data->cate_id)->get();
      return view('home.essay',['data'=>$data,'leaveword'=>$leaveword,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()      //留言创建页
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)      //留言输入数据库
    {
        $input=Input::except('_method','_token');
        $mysql=new Leaveword;
        $mysql->art_id=$input['art_id'];
        $mysql->msg=$input['msg'];
        $mysql->visitor=$input['visitor'];
        if ($mysql->save()) {
          return redirect("essay?id=".$input['art_id']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$page=1)
    {

      echo "$id"."<br>";
      echo "$page";
      // $cate=new Category;
      // $kid=$cate->kid($id);
      // $tree=new Category;
      // $treemsg=$tree->tree();
      // $data[]=Article::where('cate_id',$id)->get();
      // foreach ($kid as $key => $value) {
      //   if(count($data)>=20*$page){break;}
      //   $data[]=Article::where('cate_id',$value->cate_id)->get();
      // }
      // // echo count($data);
      // // echo $_GET['page'];
      // //dd($data);
      // //$data=Article::where($sql)->get();
      // return view('home.list',['tree'=>$treemsg,'data'=>$data,'visitor'=>$_COOKIE['togethergome'],'page'=>$page,]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mysql=Leaveword::find($id)->delete();
        if ($mysql){
          $data=['status'=>0,'msg'=>'删除成功',];
          return $data;
        }else {
          $data=['status'=>1,'msg'=>'删除失败',];
          return $data;
        }
    }
}
