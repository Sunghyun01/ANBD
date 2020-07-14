<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	const UPDATED_AT = 'edit_time';
	const CREATE_AP = 'reg_time';
	public $table = 'test';
	public $fillable = ['name','tel'];
	public $dates = ['reg_time'];
	public $dateFormat = 'Ymd';
	// public function save(array $options = []){
	// 	$this->dateFormat = 'U';
	// 	parent::save();
	// }
	public function setCreatedAtAttribute($value) {
		$this->attributes['reg_time'] = \Carbon\Carbon::now()->timestamp;
	}
}
