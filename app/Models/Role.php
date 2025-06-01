<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_name',
        'status'
    ];

    //public function users()
    //{
        //return $this->belongsToMany(
            //User::class,
            //'user_role',
            //'role_id',
            //'user_id'
        //);
    //}
}
