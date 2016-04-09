<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{

    protected $table = 'buildings';
    public $timestamps = true;

    public function getUsers()
    {
        $returnUsers = [];
        foreach ($this->floors as $floor) {
            foreach($floor->rooms as $room) {
                foreach($room->users as $user) {
                    $returnUsers[] = $user;
                }
            }
        }
        return $returnUsers;
    }

    public function floors()
    {
        return $this->hasMany('\App\Models\Floor', 'building_id');
    }

    public function rooms() {
        return $this->hasManyThrough('\App\Models\Room', '\App\Models\Floor');
    }
}