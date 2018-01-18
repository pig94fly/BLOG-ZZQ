<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
<style>
    body{background: url('http://togethergo.me/resources/file/image/home/beijing.jpg') repeat;background-size:;}
    ul{list-style-type: none;overflow: hidden;width: 100%;padding: 0;}
    ul.essay-auther{width: 100%;}
    li.content-a{float: right;text-align: right;padding-right: 10px;padding-bottom: 20px;font-size: 0.8em;}
    span.left-bar{padding-left: 20px;}
    li{float: left;padding-bottom: 4px;}
    li.top-right{float: right;}
    li.top-right,a{color: black;text-decoration: none;display: block;text-align: center;}
    li.top-ui{padding-top: 0; }
    li.left-bar{}
    li.smtitle{font-size: 0.8em;}





    a.top-right{width: 100px;font-size: 0.95em;}
    a.top-right:hover{color: orange;font-size: 1.0em;width: 100px;}
    a.left-bar{color: black;width: 180px;padding: 5px;padding-left: 20px;text-align: left;font-weight: 400;}
    a.left-bar:hover{background-color: #bebebe;}
    a.left-bar-fenlei:hover{background-color: #bebebe;}
    a.a-ui{color: black;display: block;width: 190px;font-weight: bolder;text-align: center;text-decoration: none;font-size: 1.5em;}
    a.content-text{width: auto;text-align: left;padding-left: 70px;padding-right: 70px;font-size: 0.9em;}
    a.left-bar-fenlei{text-align: left;padding: 0;padding-left: 20px;font-size: 1em;width: 180px;}
    a.normal_href{text-align: center;padding: 0;width: 0;display: inline;color: blue;text-decoration: underline;}


    div.top{min-width: 400px;max-width: 1080px;margin: auto;margin-top: 0;height: 40px;text-align: center;}
    div.top-ul{position: fixed;top: 0;width: 100%;background-color: #ffffff;left: 0;margin-top: -8px;height: 52px;filter: opacity(90%);}
    div.second{background-color: ;width: 1080px;margin: auto;margin-top: 50px;}
    div.left{ position: fixed;width: 175px;margin-left: 0;overflow: hidden;margin-top: 20px;}
    div.left-bar{filter: opacity(80%);background-color: #ffffff;margin-bottom: 5px;}
    div.middle{width: 710px;margin-left: 185px;}
    div.middle-top{position: static;text-align: center;filter: blur(0px);background: url('http://test01.com/xiaobeijing1.jpg');background-size: contain;color: white;}
    div.middle-text{background-color: #ffffff;filter: opacity(90%);width: 710px; margin-bottom: 10px;word-wrap: break-word; word-break: normal;white-space:normal; word-break:break-all;}
    div.middle-texttitle{background-color: #ffffff;padding: 10px;text-align: center;}
    div.middle-textcontent{background-color: #f2f2f5;margin: auto;;border: 1px solid;border-color: #bebebe;filter: opacity(90%);}
    div.right{background-color: ;position: fixed;width: 180px;margin-left: 905px;margin-top: 20px;}
    div.right-bar{background-color:white; filter: opacity(80%);}
    div.content-img {margin: auto;margin-top: 20px;filter: blur(1.5px);width: 550px;height: 200px;overflow: hidden;text-align: center;}
    div.bottom{width: 100%;margin: auto;background-color: white;height: 40px;filter: opacity(90%);position: relative;margin-bottom: 0;}
    div.bottom-msg{position: absolute;margin: auto;margin-bottom: -10px;margin-left: 200px; height: 30px;padding-top: 10px;}
    div.essay{margin: auto;margin-top: 60px;background-color: white;width: 960px;}
    div.essay-text{margin: auto;background-color: white;width: 720px;font-size: 0.98em;font-weight: 300;padding-bottom: 20px;}
    div.essay-authermsg li{float: right;padding: 10px; font-size: 0.90em;}
    div.essay-title{padding-top: 20px;padding-bottom: 20px;text-align: center;font-size: 0.96em;}
    div.essay-img{height: 300px;overflow: hidden;}

    div.visitor-msg{font-weight: bold;}
    div.leaveword-show{margin-bottom: 10px;background-color: #bebebe;filter: opacity(80%);}




    span.email{font-size: 0.8em;padding-left: 20px;}
    span.msgtome{font-size: 0.8em;float: middle;}
    span.fangwen{font-size: 0.8em;padding-left: 20px;}
    span.mdheader{font-size: 1.1em;padding-left: 20px;font-weight: bold;padding: 0;}
    span.leaveword-indent{text-indent: 2em;font-size: 0.9em;padding: 30px;padding-top: 4px;padding-bottom: 0;}


    p.smheader{font-size: 0.9em;font-weight: bold;padding-left: 10px;}
    p.indent{text-indent: 2em;}
    p.leaveword-indent{text-indent: 2em;font-size: 0.9em;padding: 30px;padding-top: 4px;padding-bottom: 0;}
    #divimg{margin: auto; filter: none;}
    #divimg img{border-radius: 50%;}
    #weiboimg{margin: auto;text-align: center;}
    #huanyingci{font-size: 0.48em;font-weight: 400;}
    .essay-content img{max-width: 700px;}



</style>

</head>


<body>




        <!-- body区域 -->
  <div class="essay">

    <div class="essay-img">
      <img <?php
        $arr=preg_match('/\<.?img[^>]+\>/',$data->art_content,$img);
        for ($i=1; $i  ; $i++) {
          foreach ($img as $key) {$arr1=preg_match('/src=[\"|\'][^\",^\']*[\'|\"]/',$key,$arr2);
            $arr3=substr($arr2[0],0,100);print_r($arr3);
              break;
            }
            echo 'src="http://test01.com/timg.jpg"';
            break;
        }
        ?> alt="" width="960px">
    </div>



        <!-- 中部内容 -->



                                      <!-- 内容区域 -->
        <div class="essay-text">
          <ul>
            <!-- 标题 -->
            <div class="essay-title">
              <h1>{{$data->art_title}}</h1>
            </div>
          </ul>
          <ul class="essay-auther">
                                      <!-- 文章信息 -->
            <div class="essay-authermsg">
              <li  class="essay-view">阅读量：{{$data->art_view}}</li>
              <li> 时间:{{date('Y年m月d日 h:i:s',$data->art_time)}}</li>
              <li  class="essay-auteher">作者:{{$data->art_auther}} </li>
            </div>
          </ul>

          <div class="essay-content">
            <p class="indent">
            <?php echo $data->art_content; ?></p>
          </div>
          <!-- 底部查看文章及文章分类模块 -->
          <div class="middle-texta">
            <span><ul class="content-a">
              <li class="content-a"><a href="{{url('morelist')}}?id={{$data->cate_id}}&&page=1">【点击查看相关文章】</a></li>
            </ul></span>
          </div>

        </div>
                                      <!-- 热门文章区域 -->


                                      <!-- 留言区域 -->
        <div class="essay-text">
          <div class="essay-leaveword">
            <div class="visitor-msg">
              用户：{{$_COOKIE['togethergome']}}
            </div>
            <div class="leaveword-input">
              <form class="" action="{{url('essay')}}" method="post">
                {{csrf_field()}}
                 <textarea name="msg" rows="5" cols="80"></textarea>
                 <input type="hidden" name="art_id" value="{{$data->art_id}}">
                 <input type="hidden" name="visitor" value="{{$_COOKIE['togethergome']}}">
                 <input type="submit" name="submit" value="提交留言"><br><br><br><br><br>
              </form>
            </div>


            <?php foreach ($leaveword as $value): ?>
              <div class="leaveword-show">
                <ul>
                  <li><p class="smheader">{{$value->visitor}}:</p></li>
                  <li><p class="leaveword-indent">{{$value->msg}}</p></li>
                </ul>
                <?php if ($value->visitor==$_COOKIE['togethergome']): ?>
                  <ul>
                    <li><a href="javascript:" onclick="del({{$value->id}})"><span class="leaveword-indent">删除</span></a></li>
                  </ul>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
            <br><br><br><br>
          </div>
        </div>





  </div>








<div class="top-ul">        <!-- 顶部内容 -->
  <ul><div class="top">


    <li class="top-ui"><a href="{{url('/')}}" class="a-ui">ZQer</a></li>
    <li><input type="text" id='search' name='content-search' value="搜索:" size="30"/></li>

    <li class="top-right"><a href="#" class="top-right">{{$_COOKIE['togethergome']}}</a></li>
    <li class="top-right"><a href="#" class="top-right">给我留言</a></li>
    <li class="top-right"></li>
    <li class="top-right"><a href="{{url('/')}}" class="top-right">首&nbsp;&nbsp;页</a></li>
  </div>
  </ul>
</div>


                                  <!-- 底部内容 -->
<div class="bottom">
  <div class="bottom-msg">
    Copyright @2017. Powered By <a href="{{url('/')}}" class="normal_href">http://togethergo.me</a>

  </div>
</div>

</body>
<script type="text/javascript">
  function del(id)
  {
    layer.confirm('您确定要删除这个分类吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('essay')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
</html>
