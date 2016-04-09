<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model {

	protected $table = 'workspaces';
	public $timestamps = true;

	public function users()
	{
		return $this->hasMany('App\Models\User', 'workspaceId');
	}

	public function specialworkspace()
	{
		return $this->hasOne('App\Models\SpecialWorkspace', 'id');
	}

}