<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_detail';
    protected $primaryKey = 'user_detail_id';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'mobile',
    ];

    public $timestamps = false;
}