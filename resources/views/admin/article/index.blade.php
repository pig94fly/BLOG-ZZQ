@extends('layouts.admin')
<section>


    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
          {{csrf_field()}}
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="all">====全 部====</option>

                            <?php $arr=[];foreach ($data as $v): ?>
                            <option value="{{$v->cate_id}}">{{$v->_cate_name}}</option>
                            <?php $arr["$v->cate_id"]=$v->cate_name;endforeach; ?>

                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('article/create')}}"><i class="fa fa-plus"></i>添加文章</a>
                    <a href="{{url('article')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>

                        <th class="tc">文章ID</th>
                        <th>所属分类</th>
                        <th>文章标题</th>
                        <th>文章内容</th>
                        <th>发表时间</th>
                        <th>查看次数</th>
                        <th>操作</th>

                    </tr>


										<?php foreach ($artdata as $a): ?>
                    <tr>


                        <td class="tc" width="5%">{{$a->art_id}}</td>
                        <td width="10%">
                            <a href="#">{{$arr["$a->cate_id"]}}</a>
                        </td>
                        <td>{{$a->art_title}}</td>
                        <td><?php if (strlen($a->art_content)>100): ?>
                          <ul>{{substr($a->art_content,0,100)}}
                          <span><a href="javascript:" onclick="">..</a></span></ul>
                        <?php endif; ?></td>
                        <td>{{date('Y年m月d日',$a->art_time)}}</td>
                        <td>{{$a->art_view}}</td>
                        <td>
                            <a href="{{url('article/'.$a->art_id.'/edit')}}">修改</a>
                            <a href="javascript:" onclick="del({{$a->art_id}})">删除</a>
                        </td>
                    </tr>
										<?php endforeach; ?>

                </table>


<div class="page_nav">
<div>
<a class="first" href="{{url('article/')}}/?page=1">第一页</a>
<?php if ($page!=1): ?>
  <a class="prev" href="{{url('article/')}}/?page={{$page-1}}">上一页</a>
<?php endif; ?>
<?php for ($i=$page-2; $i < $page&&$i>0; $i++):  ?>
  <a class="num" href="{{url('article/')}}/?page={{@$i}}">{{$i}}</a>
<?php endfor; ?>
<span class="current">{{$page}}</span>
<?php for ($i=$page+1; $i < $page+3&&$i<=$page_num; $i++):  ?>
  <a class="num" href="{{url('article/')}}/?page={{@$i}}">{{$i}}</a>
<?php endfor; ?>
<?php if ($page_num>3): ?>
  <span>....</span>
  <a class="num" href="{{url('article/')}}/?page={{$page_num}}">{{$page_num}}</a>
<?php endif; ?>
<a class="next" href="{{url('article/')}}/?page={{$page+1}}">下一页</a>
<a class="end" href="{{url('article/')}}/?page={{$page_num}}">最后一页</a>
<span class="rows">{{$data_num}} 条记录</span>
</div>
</div>




            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<script>
function changeOrder(obj,cate_id){
		var cate_order = $(obj).val();
		$.post("{{url('admin/cate_changeorder')}}",{'_token':'{{csrf_token()}}','cate_id':cate_id,'cate_order':cate_order},function(data){
				if(data.status == 0){
						layer.msg(data.msg, {icon: 6});
				}else{
						layer.msg(data.msg, {icon: 5});
				}
		});
}

function del(art_id){

  layer.confirm('您确定要删除这篇文章吗？', {
              btn: ['确定','取消'] //按钮
          }, function(){
              $.post("{{url('article')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                  if(data.status==0){
                      location.href = location.href;
                      layer.msg(data.msg, {icon: 6});
                  }else{
                      layer.msg(data.msg, {icon: 5});
                  }
              });
  //            layer.msg('的确很重要', {icon: 1});
          }, function(){

          });

}


</script>

</section>
