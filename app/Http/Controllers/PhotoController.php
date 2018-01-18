<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PhotoController extends Controller
{
    //图片展示控制器
    public function index ($id){
      //$id1 = str_replace('-','/',$id);

      setcookie('user','lanlan2',time()+3600,'/');
      $start = microtime(true);
      $id1 = str_replace('_','/',$id);
      $redis = new \Redis();
      $redis ->connect('127.0.0.1',6379);
      if ($redis->set('hello','helloword')) {
        echo 'success: '.$result = $redis->get('hello');
      }else {
        echo 'failed: '.$result = $redis->get('hello');
      }
      echo '<br>';
      //$redis->setex('hi',30,'nice');
      echo $redis->get('hi');
      $path = $_SERVER['DOCUMENT_ROOT'].'/'.$id1;
      echo $path,$_COOKIE['user'].'<br>';
      $cryptpath = Crypt::encryptString($path);
      //$decrypted = Crypt::decryptString($encrypted);
      $cryptcookie = Crypt::encryptString($_COOKIE['user']);
      //echo $encrypted.' and '.$decrypted.'<br/>';
      echo '<img src="http://laravel.go/makepic?data='.$cryptpath.'&sig='.$cryptcookie.'" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/makepic?data='.$cryptpath.'&sig='.$cryptcookie.'" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/makepic?data='.$cryptpath.'&sig='.$cryptcookie.'" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/makepic?data='.$cryptpath.'&sig='.$cryptcookie.'" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/makepic?data='.$cryptpath.'&sig='.$cryptcookie.'" width="40%" height="40%"/>';
      $end = microtime(true);
      echo "<br/>";
      echo $end-$start;
      echo '<a href="http://laravel.go/makepic">makepic</a>';
      echo $_COOKIE['pictime'];
      return '<br/>'.$id1.'<br/>test1';

    }
    public function pic(){
      header('Content-type: image/jpeg');
      $picstart = microtime(true);
      $decryptcookie = Crypt::decryptString($_GET['sig']);
      if ($_COOKIE['user'] != $decryptcookie) {
        return 'false';
      }else {
      $path = Crypt::decryptString($_GET['data']);
      //$path = '/home/zzq-pc/www/laravel/public/1.jpg';
      $img = fread(fopen($path,'rb'),filesize($path));
      $picstop = microtime(true);
      setcookie('pictime',$picstop-$picstart,time()+3600,'/');
      return $img;
      //return $path;
      }
    }
}
