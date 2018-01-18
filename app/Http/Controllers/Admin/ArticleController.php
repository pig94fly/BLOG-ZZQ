<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Usermsg;
use App\Http\Requests;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page=1)
    {
      $tree=new Category;
      $data=$tree->tree();
      $data_num=Article::count();
      $page_num=(int)($data_num/20+1);
      $artdata=Article::paginate(20);

      foreach ($artdata as $value) {

      }
      return view('admin.article.index',['data'=>$data,'artdata'=>$artdata,'page'=>$page,'page_num'=>$page_num,'data_num'=>$data_num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tree=new Category;
        $data=$tree->tree();
        return view('admin.article.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input=Input::except('_token');
        //dd($input);
        preg_match("/\<img[^\>]*\>/",$input['art_content'],$image);
        preg_match("/src=\"[^\"]*\"/",@$image[0],$src);
        $src=substr(@$src[0],5,-1);

        $article=new Article;
        $article->cate_id=$input['cate_id'];
        $article->art_title=$input['art_title'];
        $article->art_tag=$input['art_tag'];
        $article->art_descript=$input['art_descript'];
        $article->art_thumb=$src;
        $article->art_content=$input['art_content'];
        $article->art_auther=$input['art_auther'];
        time();
        $article->art_time=time();
        if($article->save()){
          $usermsg=Usermsg::find(1);
          if ($_POST['article_owner']==0){
            $usermsg->original++;
            $usermsg->save();
          }else {
            $usermsg->reprint++;
            $usermsg->save();
          }
        }
          return redirect('article');
        // $data=[
        //   'status' => 0,
        //   'msg' => '提交成功',
        // ];
        // }else {
        //    $data=[
        //     'status' => 1,
        //      'msg' => '提交失败',
        //    ];
        //}

         //return $data;
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
        $arti=Article::find($id);
        $tree=new Category;
        $data=$tree->tree();
        echo $id;
        //dd($arti);
        return view('admin.article.edit',['arti'=>$arti,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $input=Input::except('_token','_method');
        $a=Article::find($id)->update($input);
        if($a){return redirect('article');}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


      $deldata=Article::find($id);
      $owner=$deldata->article_owner;
      //dd($deldata);
      if($deldata->delete()){
        $usermsg=Usermsg::find(1);
        if($owner==0){$usermsg->original--;$usermsg->save();}else {
          $usermsg->reprint--;$usermsg->save();
        }
        $data=[
          'status' => 0,
          'msg' => '删除成功',
        ];
      }else{
        $data=[
          'status' => 1,
          'msg' => '删除失败',
        ];
      }
      return $data;
    }
}
