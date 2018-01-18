<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='category';
    protected $primaryKey='cate_id';
    public $timestamps=false;
    protected $guarded=[];

              // 分类获取
    public function tree(){
      $data=$this->orderBy('cate_order','asc')->get();
      return $this->getTree($data,'cate_name','cate_id','cate_pid');
    }
              // 获得分类树
    public function getTree($data,$cname,$cid,$cpid,$pid=0,$arr = array(),$pre="| "){
      foreach ($data as $key => $value) {
        if($value->$cpid==$pid){
          $data[$key]["_".$cname]=$pre.$data[$key][$cname];
          $arr[]=$data[$key];
          $arr=$this->getTree($data,$cname,$cid,$cpid,$value->cate_id,$arr,$pre."--");
        }
      }
      return $arr;
    }

    public function kid($id){

      $data=$this->all();
      $kid=array();
      return $this->getkid($data,$id,$kid);

    }

    public function getkid($data,$id,$kid = array()){

        foreach ($data as $key => $value) {
          if($value->cate_pid==$id){
             $kid[]=$data[$key];
             $kid=$this->getkid($data,$value->cate_id,$kid);
          }
        }
       return $kid;
    }

    public function parent($id){
      $data=$this->all();
      $perentdata=$this->find($id);
      $id=$perentdata->cate_pid;
      $parent=array();
      return $this->getparent($data,$id,$parent);
    }

    public function getparent($data,$id,$parent){
      foreach ($data as $key => $value) {
        if ($value->cate_id==$id) {
          $parent[]=$data[$key];
          $kid=$this->getparent($data,$value->cate_pid,$parent);
        }
      }
      return $parent;
    }
}
