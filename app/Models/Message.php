<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $primaryKey = 'message_id';

    protected $fillable = [
        'msg', 'img', 'receiver_id', 'sender_id', 'status'
    ];
}


?>