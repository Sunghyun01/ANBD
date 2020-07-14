<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTel extends Model
{
	const UPDATED_AT = 'edit_time';
	const CREATE_AP = 'reg_time';
	public $table = 'user_tels';
	public $fillable = ['user_id','tel'];
	public $dates = ['reg_time','edit_time'];
	public $dateFormat = 'Ymd';
	// public function save(array $options = []){
	// 	$this->dateFormat = 'U';
	// 	parent::save();
	// }
	public function setCreatedAtAttribute($value) {
		$this->attributes['reg_time'] = \Carbon\Carbon::now()->timestamp;
	}
	public function setUpdatedAt($value) {
		$this->attributes['edit_time'] = \Carbon\Carbon::now()->timestamp;
	}
}
