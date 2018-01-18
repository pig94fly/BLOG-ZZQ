<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Usermsg extends Model
{
    //
    protected $table='usermsg';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $guarded=[];
}
