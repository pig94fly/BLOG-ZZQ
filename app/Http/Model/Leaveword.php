<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Leaveword extends Model
{
  protected $table='leaveword';
  protected $primaryKey='id';
  public $timestamps=false;
  protected $guarded=[];
}
