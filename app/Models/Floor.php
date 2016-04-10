<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{

    protected $table = 'floors';
    public $timestamps = true;


    public function rooms()
    {
        return $this->hasMany('\App\Models\Room', 'floor_id');
    }

    public function building()
    {
        return $this->belongsTo('\App\Models\Building', 'building_id','id');
    }

    public function freeSpots(){
        $taken = count($this->users);
        $spots = 0;
        foreach($this->rooms as $room){
            $spots = $spots + $room->max_users;
        }

        return $spots - $taken;
    }

    public function users() {
        return $this->hasManyThrough('\App\Models\User', '\App\Models\Room');
    }

}