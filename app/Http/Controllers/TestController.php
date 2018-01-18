<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Http\Model\Adminuser;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Test\Test as Test;

/**
 *
 */
class TestController extends Controller
{
  public function index(){
    // $mysql = new \mysqli("localhost","root","","blog") or die("cuowu");
    // $sql="select * from Article limit 0,10";
    // $result=$mysql->query($sql);
    // while ($row = mysqli_fetch_assoc($result))
    // {
    // echo "question_title : {$row['cate_id']} <br>";
    //
    // }

    //$mysql = Adminuser::where('id',1)->update(['username'=>'admin','password'=>'123456']);
    //$mysql = Adminuser::find(1);
    //echo $mysql->username;
    //print_r($mysql);

    /*$test = Adminuser::where('id',1)->get(['password']);
    // echo $test->username;
    // echo $test->password;
    foreach ($test as $key => $value) {
      echo $value->username;
      echo $value->password;
    }*/


    $test = new Test(11);
    $test->index();
    
      ?>
    <html>
    <body>
      <p>111</p>

      <script type="text/javascript">

      </script>
    </body>
    </html>
<?php
  }



}
