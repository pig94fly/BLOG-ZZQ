@extends('layouts.admin');
<section>


    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;  添加文章分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/category/'.$edit['cate_id'])}}" method="post">
          <input type="hidden" name="_method" value="put">
					{{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>父级分类：</th>
                        <td>
                            <select name="cate_pid">
                                <option value="0">| 主分类</option>
                                @foreach($data as $v)
                                <option value="{{$v['cate_id']}}" <?php if($v['cate_id']==$edit['cate_pid']) {echo 'selected="selected"';} ?>>{{$v['_cate_name']}}</option>
                                @endforeach

                            </select>
                        </td>
                    </tr>
										<tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" class="sm" name="cate_name" value="{{$edit['cate_name']}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类标题：</th>
                        <td>
                            <input type="text" class="lg" name="cate_title" value="{{$edit['cate_title']}}">
                        </td>
                    </tr>
										<tr>
												<th>关键词：</th>
												<td>
														<textarea name="cate_keyword">{{$edit['cate_keyword']}}</textarea>
												</td>
										</tr>
										<tr>
												<th>描述：</th>
												<td>
														<textarea name="cate_descript">{{$edit['cate_descript']}}</textarea>
												</td>
										</tr>
										<tr>
												<th><i class="require">*</i>排序：</th>
												<td>
														<input type="text" class="sm" name="cate_order" value="{{$edit['cate_order']}}">
												</td>
										</tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</section>
