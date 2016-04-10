<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

	protected $table = 'rooms';
	public $timestamps = true;

	public function floor(){
		return $this->belongsTo('\App\Models\Floor', 'id');
	}

	public function users() {
		return $this->hasMany('\App\Models\User', 'room_id');
	}

    public function freeSpots()
    {
        return $this->max_users - count($this->users);
    }


}