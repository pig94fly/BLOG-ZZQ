<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class TestController extends Controller
{
    public function index(){

      $start = microtime(true);
      $uAgent = $_SERVER['HTTP_USER_AGENT'];
      $osPat = "mozilla|m3gate|winwap|openwave|Windows NT|Windows 3.1|95|Blackcomb|98|ME|XWindow|ubuntu|Longhorn|AIX|Linux|AmigaOS|BEOS|HP-UX|OpenBSD|FreeBSD|NetBSD|OS\/2|OSF1|SUN";
      if(preg_match("/($osPat)/i", $uAgent ))
      {
        echo "来自PC访问";
      }
      else
      {
        echo "其他终端访问";
      }
      setcookie('user','lanlan2',time()+3600,'/');
      $start = microtime(true);
      $id1 = str_replace('_','/','$id');
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
      echo '<img src="http://laravel.go/1.jpg" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/1.jpg" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/1.jpg" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/1.jpg" width="40%" height="40%"/>';
      echo '<img src="http://laravel.go/1.jpg" width="40%" height="40%"/>';
      $stop = microtime(true);
      return $stop-$start;
    }
}
