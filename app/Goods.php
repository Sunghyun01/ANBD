<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'anbd_goods';
    protected $primaryKey = 'idx';
    public $timestamps = false;

    protected $fillable = ['idx','pidx','goods_name','comment','img','writer','hash','place','reg_time'];

}
