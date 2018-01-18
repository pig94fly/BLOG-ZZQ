<!DOCTYPE html>
<html>
<head>
  <title>文章列表--ZQer的博客</title>
<meta charset="utf-8">
<script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>

<style>
    body{background: url('http://test01.com/beijing.jpg') repeat;background-size: 25%;margin-bottom: 20px;}
    ul{list-style-type: none;overflow: hidden;width: 100%;padding: 0;}
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
    a.left-bar{color: black;width: 160px;padding: 5px;padding-left: 20px;text-align: left;font-weight: 400;font-size: 0.95em;}
    a.left-bar:hover{background-color: #bebebe;}
    a.left-bar-fenlei:hover{background-color: #bebebe;width: 160px;}
    a.a-ui{color: black;display: block;width: 190px;font-weight: bolder;text-align: center;text-decoration: none;font-size: 1.5em;}
    a.content-text{width: auto;text-align: left;padding-left: 70px;padding-right: 70px;font-size: 0.9em;}
    a.left-bar-fenlei{text-align: left;padding: 0;padding-left: 20px;font-size: 1em;width: 145px;}
    a.normal_href{text-align: center;padding: 0;width: 0;display: inline;color: blue;text-decoration: underline;}
    a.first{width: 50px;display: inline-block;color: blue;padding: 10px;}
    a.next{display: inline-block;;color: blue;padding: 10px;}



    div.top{min-width: 400px;max-width: 1080px;margin: auto;margin-top: 0;height: 40px;text-align: center;}
    div.top-ul{position: fixed;top: 0;width: 100%;background-color: #ffffff;left: 0;margin-top: -8px;height: 52px;filter: opacity(90%);}
    div.second{background-color: ;min-height: 1000px;width: 960px;margin: auto;margin-top: 50px;}
    div.left{ position: fixed;width: 175px;margin-left: 0;overflow: hidden;margin-top: 20px;}
    div.left-bar{filter: opacity(80%);background-color: #ffffff;margin-bottom: 5px;}
    div.middle{width: 710px;margin-left: 185px;}
    div.middle-top{position: static;text-align: center;filter: blur(0px);background: url('http://test01.com/xiaobeijing1.jpg');background-size: contain;color: white;}
    div.middle-text{background-color: #ffffff;filter: opacity(90%);width: 710px; margin-bottom: 10px;word-wrap: break-word; word-break: normal;white-space:normal; word-break:break-all;}
    div.middle-texttitle{background-color: #ffffff;padding: 10px;text-align: center;}
    div.middle-textcontent{background-color: #f2f2f5;margin: auto;;border: 1px solid;border-color: #bebebe;filter: opacity(90%);}
    div.right{background-color: ;position: fixed;width: 180px;margin-left: 905px;margin-top: 20px;}
    div.right-bar{background-color:white; filter: opacity(80%);}
    div.content-img {margin: auto;margin-top: 20px;width: 550px;height: 200px;overflow: hidden;text-align: center;}
    div.bottom{overflow: hidden;width: 100%;margin: auto;margin-bottom: -20px;background-color: white;height: 40px;filter: opacity(90%);position: relative;margin-bottom: 0;}
    div.bottom-msg{width: 1080px;margin-left: 300px;margin-top: -10px;position: absolute;height: 40px;padding-top: 4px;padding-bottom: 10px;font-size: 0.9em;}
    div.page_nav{background-color: white;text-align: center;}
    div.navigation{background: white;width: 690px;margin: auto;padding: 10px;margin-bottom: 20px;}



    span.email{font-size: 0.8em;padding-left: 20px;}
    span.msgtome{font-size: 0.8em;float: middle;}
    span.fangwen{font-size: 0.8em;padding-left: 20px;}
    span.mdheader{font-size: 1.1em;padding-left: 20px;font-weight: bold;padding: 0;}
    span.fontcolor-white{color: white;padding: 80px;}



    p.smheader{font-size: 0.9em;font-weight: bold;padding-left: 10px;}
    p.indent{text-indent: 2em;}
    #divimg{margin: auto; filter: none;}
    #divimg img{border-radius: 50%;}
    #weiboimg{margin: auto;text-align: center;}
    #huanyingci{font-size: 0.48em;font-weight: 400;}

    .navigation {      margin:auto auto 10px 10px;      float:left;    }
    .wp-paginate {      padding:0;      margin:0;    }
    .wp-paginate li {      float:left;      list-style:none;      margin:2px;      padding:0;    }
    .wp-paginate a {      margin:0 2px;      line-height:20px;      text-align:center;      text-decoration:none;      border-radius:3px;      -moz-border-radius:3px;      float:left;      min-height:20px;      min-width:20px;      color:#858585;      border:2px #e3e3e3 solid;      border-radius:13px;      font-size:11px;    }
    .wp-paginate a:hover {      border:2px #858585 solid;      color:#858585;    }
    .wp-paginate .title {      color:#555;      margin:0;      margin-right:4px;      font-size:14px;    }
    .wp-paginate .gap {      color:#999;      margin:0;      margin-right:4px;    }
    .wp-paginate .current {      margin:0 2px;      line-height:20px;      text-align:center;      text-decoration:none;      border-radius:3px;      -moz-border-radius:3px;      float:left;    font-weight:700;    min-height:20px;    min-width:20px;    color:#262626;    border:2px #119eda solid;    border-radius:13px;    font-size:11px;    color:#119eda;}
    .wp-paginate .page {  margin:0;    padding:0;}
    .wp-paginate .prev {}
    .wp-paginate .next {margin:0;    padding:0;}



</style>

</head>


<body>




        <!-- body区域 -->
  <div class="second">

    <div class="left">        <!-- 左侧导航栏 -->
      <!-- 首页推荐导航栏 -->
      <div class="left-bar">
          <ul class="left-bar">
            <li>
            <ul><a href="{{url('/')}}" class="left-bar">首页</a></ul>
            <ul><a href="#" class="left-bar">我的收藏</a></ul>
            <ul><a href="#" class="left-bar">我的推荐</a></ul>
            </li>
          </ul>
      </div>
      <!-- 个人资料介绍栏 -->
      <div class="left-bar">
          <ul>
            <a href="http://weibo.com/u/1537470457?refer_flag=1001030102_&is_all=1" class="left-bar">关注我的微博</a>
            <div id="weiboimg">
            <span ><img src="http://togethergo.me/resources/file/image/home/weibo.jpg" alt="微博--我不叫得潜" width='150px'></span>
          </div>
            <p><span class="email">mail:</span>
            <span class="email">&nbsp;&nbsp;&nbsp;&nbsp;zhu94fly@gmail.com</span></p>
            <a href="#" class="left-bar"><span class="msgtome">给我留言</span></a>
          </ul>
      </div>
      <!-- 文章分类列表 -->
      <div class="left-bar">
        <ul>
          <p class="smheader">分类列表：</p>

        <?php foreach ($tree as $value): ?>
          <li>  <a href="{{url('essaylist')}}?id={{$value->cate_id}}&&page=1" class="left-bar-fenlei"><span class="msgtome">{{$value->_cate_name}}</span></a></li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>





    <div class="middle">            <!-- 中部内容 -->
      <p><br></p>
      <div class="middle-top">       <!-- 欢迎页 -->
        <p><br> </p>
        <div id="divimg">
          <img src="http://togethergo.me/resources/file/image/home/touxiang.jpg" alt="touxiang"width="100px"/>
        </div>
        <h1>博客--ZQer <span id="huanyingci"><br>欢迎来到我的博客</span></h1>
        <p><br></p>
      </div>

                                      <!-- 内容区域 -->
      <?php foreach ($data as $values): if ($i<($page-1)*20||$i>=$page*20) {
        $i++;echo "string".$page.$id;continue;
      } ?>

        <?php foreach ($values as $key => $value): $arr=$value->art_id; ?>


        <div class="middle-text">
          <div class="middle-texttitle">
          <p><span class="mdheader">{{$value->art_title}}</span></p>
          </div>
          <!-- 缩略图及少量文字区域 -->
          <div class="middle-textcontent">
            <!-- 获取文本中图片模块 -->
            <div class="content-img"><a href="{{url('essay')}}?id={{$value->art_id}}" >
              <img <?php
                $arr=preg_match('/\<.?img[^>]+\>/',$value->art_content,$img);
                foreach ($img as $key) {$arr1=preg_match('/src=[\"|\'][^\",^\']*[\'|\"]/',$key,$arr2);
                  $arr3=substr($arr2[0],0,100);print_r($arr3);}?> alt="" width="550px">
              </a></div>
              <!-- 获取文本中文字前100个 -->
            <span class="normalp"><p class="indent">
              <a href="{{url('essay')}}?id={{$value->art_id}}" class="content-text"> <?php
                if(strlen($value->art_content)>100){
                    $arr=preg_replace('/\<[^>]+\>/',"",$value->art_content);
                    //dd($arr_pre);
                    $arr=mb_substr($arr,0,101);
                    print_r($arr);echo "....";}else {
                      echo "$value->art_content";}
              ?> </a>
          </p></span>
          </div>

          <!-- 底部查看文章及文章分类模块 -->
          <div class="middle-texta">
            <span><ul class="content-a">
              <li class="content-a"><a href="{{url('essay')}}?id={{$value->art_id}}">【查看文章】</a></li>
              <li class="content-a"><?php foreach ($tree as $key) {
                if ($key->cate_id==$value->cate_id) {
                  echo "$key->cate_name";
                }
              } ?></li>
              <li class="content-a">文章分类：</li>
            </ul></span>
          </div>

        </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
      <?php if (@$arr!=""): ?>
      <div class="navigation">
        <ol class="wp-paginate">
          <li><span class="title">Pages:</span></li>
          <?php if ($page>3): ?>
            <li><a href="{{url('essaylist')}}?id={{$id}}&&page=1" title="1" class="page">1</a></li>
          <?php endif; ?>
          <?php for ($i=$page-2; $i < $page&&$i>0; $i++):  ?>
            <li><a href="{{url('essaylist')}}?id={{$id}}page={{@$i}}" title="{{@$i}}" class="page">{{@$i}}</a></li>
          <?php endfor; ?>
          <li><span class="page current">{{$page}}</span></li>

          <li><span class="gap">...</span></li>

          <li><a href="{{url('essaylist')}}?id={{$id}}&&page={{$page+1}}" class="next">&gt;</a></li>
        </ol>
      </div>
      <?php else: ?>
      <div class="middle">

          <h2><span class="fontcolor-white">好像没有内容哦！</span></h2>

      </div>
    <?php endif; ?>

    </div>



  </div>








<div class="top-ul">        <!-- 顶部内容 -->
  <ul><div class="top">


    <li class="top-ui"><a href="{{url('/')}}" class="a-ui">ZQer</a></li>
    <li><input type="text" id='search' name='content-search' value="搜索:" size="30"/></li>

    <li class="top-right"><a href="#" class="top-right">{{$visitor}}</a></li>
    <li class="top-right"><a href="#" class="top-right">给我留言</a></li>
    <li class="top-right"></li>
    <li class="top-right"><a href="{{url('/')}}" class="top-right">首&nbsp;&nbsp;页</a></li>
  </div>
  </ul>
</div>

<!-- 底部内容 -->
<div class="bottom">
  <div class="bottom-msg">
    <p>Copyright @2017. Powered By <a href="{{url('/')}}" class="normal_href">http://togethergo.me</a></p>

  </div>
</div>


</body>
