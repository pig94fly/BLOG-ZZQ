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

class CommonController extends Controller
{
    public function index(){
      return 111;
    }

    public function essaylist(){

      $cate=new Category;
      $kid=$cate->kid($_GET['id']);
      $tree=new Category;
      $treemsg=$tree->tree();
      $data[]=Article::where('cate_id',$_GET['id'])->get();
      foreach ($kid as $key => $value) {
        if(count($data)>=20*$_GET['page']){break;}
        $data[]=Article::where('cate_id',$value->cate_id)->get();
      }
      if($_GET['page']-1>(int)(count($data)/20)){
        return view('home.list',['tree'=>$treemsg,'data'=>$data,'visitor'=>$_COOKIE['togethergome'],'page'=>1,'i'=>0,'id'=>$_GET['id'],]);
      }
      // echo count($data);
      // echo $_GET['page'];
      //dd($data);
      //$data=Article::where($sql)->get();
      return view('home.morelist',['tree'=>$treemsg,'data'=>$data,'visitor'=>$_COOKIE['togethergome'],'page'=>$_GET['page'],'i'=>0,'id'=>$_GET['id'],]);
      
    }

    public function morelist(){
      $cate=new Category;
      $parent=$cate->parent($_GET['id']);
      $tree=new Category;
      $treemsg=$tree->tree();
      $data[]=Article::where('cate_id',$_GET['id'])->get();
      foreach ($parent as $key => $value) {
        if(count($data)>=20*$_GET['page']){break;}
        $data[]=Article::where('cate_id',$value->cate_id)->get();
      }
      if($_GET['page']-1>(int)(count($data)/20)){
        return view('home.morelist',['tree'=>$treemsg,'data'=>$data,'visitor'=>$_COOKIE['togethergome'],'page'=>1,'i'=>0,'id'=>$_GET['id'],]);
      }
      return view('home.morelist',['tree'=>$treemsg,'data'=>$data,'visitor'=>$_COOKIE['togethergome'],'page'=>$_GET['page'],'i'=>0,'id'=>$_GET['id'],]);

    }

}
