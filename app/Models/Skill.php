<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

	protected $table = 'skills';
	public $timestamps = true;

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'users_skills', 'skill_id', 'user_id');
    }
}