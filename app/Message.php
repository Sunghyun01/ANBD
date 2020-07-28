<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'anbd_message';
    protected $primaryKey = 'idx';
    public $timestamps = false;//

    protected $fillable = ['idx','post_id','get_id','message','see','reg_time'];
}
