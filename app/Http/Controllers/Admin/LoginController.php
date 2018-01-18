<?php
namespace App\Http\Controllers\Admin;

use App\User;
use Validator;
use App\Http\Model\Adminuser;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
/**
 *
 */
class LoginController extends CommonController
{

  public function index(){
      session(['user'=>null]);
      return view('admin.login');

  }

  public function logincheck(){
      session_start();
      echo $_SESSION["code"];
      if($_POST['code']!=$_SESSION['code']){
        $_SESSION['msg']='验证码错误！';
        return redirect('admin/login');
      }
      if ($_POST['username']!="") {
          $admin=Adminuser::where('username',$_POST['username'])->get();
          if($admin == null){return redirect('admin/login');}
          foreach ($admin as $user) {
            echo $user->username;
            if($user->password==$_POST['password']){
            session(['user' => $user->username]);

            echo "chenggong";
            //dd(session('user'));
            return redirect('admin/index');
            //header("location：$url");
          }
      }  }  }


    public function pwdrewrite(){
        $input=Input::all();
        $data=['username'=>session('user'),'password'=>$input['password'],];
        if($admin=Adminuser::where(['username' => session('user'),'password' => $input['password_o']])->update($data)){
          return redirect('admin/index');
        }else {
          return redirect('admn/pass');
        }
    }
}



 ?>
