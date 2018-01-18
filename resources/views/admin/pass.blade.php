@extends('layouts.admin')
<section>


    <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 修改密码
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密码</h3>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form method="post" action="{{url('admin/loginpwd')}}">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密码：</th>
                <td>
                    <input type="password" name="password_o"> </i>请输入原始密码</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密码：</th>
                <td>
                    <input type="password" name="password"> </i>新密码6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>确认密码：</th>
                <td>
                    <input type="password" name="password_c"> </i>再次输入密码</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交" onclick="check(form)">
                    <input type="button" class="back"  value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</section>
<script language="javascript">
    function check(form){
      //alert(form.password_o.value);
      if (form.password_o.value.length<4){
        alert("请确认你的密码是否正确！");
        form.password_o.focus();
        return false;}
      if (form.password.value!=form.password_c.value) {
        alert("您两次输入的新密码不一致！")
        return false;
        }
    }
</script>
