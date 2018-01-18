<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Article;
use App\Http\Model\Usermsg;
use App\Http\Model\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index($page=1)
    {
        $data=Article::orderBy("art_view",'desc')->paginate(20);
        $count=Article::count();
        $pagenum=(int)($count/20)+1;
        $msg=array();
        $msg['pagenum']=$pagenum;
        $msg['page']=$page;
        $usermsg=Usermsg::find(1);
        $usermsg->view++;
        $tree=new Category;
        $treemsg=$tree->tree();
        $essay['hot'] = Article::take(10)->orderby('art_view','desc')->get();
        $essay['new'] = Article::take(10)->orderby('art_time','desc')->get();
        if(!isset($_COOKIE['togethergome'])){

          setcookie('togethergome',"游客".$usermsg->view,time()+32000000);
          $usermsg->save();
          return view('home.index',['data'=>$data,'usermsg'=>$usermsg,'tree'=>$treemsg,'essay'=>$essay,'msg'=>$msg,]);
        }else {
          $usermsg->save();
          return view('home.index',['data'=>$data,'usermsg'=>$usermsg,'tree'=>$treemsg,'essay'=>$essay,'msg'=>$msg]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $str=Article::all();
      $data=[];
      foreach ($str as $value) {
        $arr1=preg_match('/\<img[^>]+\>/',$value->art_content,$arr);
        foreach ($arr as $key) {
          $arr1=preg_match('/src=[\"|\'][^\",^\']*[\'|\"]/',$key,$arr2);
          $arr3=substr($arr2[0],0,100);
          print_r($arr3);
        }
             }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

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
        //
    }
}
