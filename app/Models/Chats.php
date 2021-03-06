<?php
/**
 * Chats.php
 * Created by: koen
 * Date: 4/9/16
 * Time: 11:10 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $table = 'chats';
    public $timestamps = true;

    public $fillable = [
        "start_user",
        "receive_user"
    ];

}