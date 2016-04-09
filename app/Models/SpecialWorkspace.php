<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialWorkspace extends Model {

	protected $table = 'specialworkspaces';
	public $timestamps = true;

	public function workspace()
	{
		return $this->belongsTo('App\Models\Workspace', 'hasSpecialWorkspace');
	}

}