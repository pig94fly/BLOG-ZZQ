<?php
  namespace App\Http\Model\Test;

  /**
   *
   */
  class Test
  {
    public $value;
    public $a = '<br>'.'112';
    function __construct($a = null)
    {
      $a == null? $this->value = 'null' : $this->value = $a;
    }

    public function index(){
      echo date('Y年m月d日 H点i分s秒').' and '.$this->value;
      $a = 1;
      echo $a<<6000;
      echo @($a/0);


    }
  }



 ?>
