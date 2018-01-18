<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
// use App\Http\Controllers\Controller;

class CategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "string<br/>";
        $tree=new Category;
        $cate=$tree->tree();
        return view('admin.category.index')->with('data',$cate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//添加分类
    {
        $tree=new Category;
        $str=$tree->tree();

        return view('admin.category.add')->with('data',$str);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input=Input::all();
        if(@$input['cate_name']!=""){
        $category=new Category;
        $category->cate_pid=$input['cate_pid'];
        $category->cate_name=$input['cate_name'];
        $category->cate_title=$input['cate_title'];
        $category->cate_keyword=$input['cate_keyword'];
        $category->cate_descript=$input['cate_description'];
        $category->cate_order=$input['cate_order'];
        $re=$category->save();
        if($re==1){return redirect('admin/category');}
      }
        return redirect('admin/category/create');

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
        $category=new Category;
        $data=$category->tree();
        $editdata=Category::find($id);
        return view('admin.category.edit',['data'=>$data,'edit'=>$editdata]);
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
      if(Category::where('cate_id',$id)->update($input)){
        return redirect("admin/category");
      }
      else{return redirect("admin/category/$id/edit");}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)         //删除分类
    {
        $deldata=Category::find($id);

        $del_pid=$deldata->cate_pid;
        if($deldata->delete()){
          Category::where('cate_pid',$id)->update(['cate_pid' => $del_pid]);
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

    public function changeOrder(){
      $input=Input::all();
      $re=0;
      if($input['cate_order']!=''){
      $cate=Category::find($input['cate_id']);
      $cate->cate_order=$input['cate_order'];
      $re=$cate->update();}
      if($re){
        $data=['status'=>0,'msg'=>'success',];

      }else{$data=['status'=>1,'msg'=>'defeat',];}
      return $data;
    }
}
