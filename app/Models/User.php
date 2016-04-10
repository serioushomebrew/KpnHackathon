<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','workspace_id','function','description','image','image_thumb','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
	protected $table = 'users';
	public $timestamps = true;

	public function floor() {
		return $this->hasOne('\App\Models\Floor', 'id');
	}

    public function skills()
    {
        return $this->hasManyThrough('\App\Models\Skill','\App\Models\UserSkill','user_id','id','id');
    }

}