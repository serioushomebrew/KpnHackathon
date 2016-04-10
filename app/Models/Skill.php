<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

	protected $table = 'skills';
	public $timestamps = true;

	public function users() {
		return $this->hasManyThrough('\App\Models\User','\App\Models\UserSkill','skill_id','id','id');
	}

}