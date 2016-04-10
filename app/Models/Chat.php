<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    public $timestamps = true;

    public function user() {
        return $this->hasOne('\App\Models\User', 'id', 'user_id');
    }
}
