<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'service_description',
        'img'
    ];

    public $timestamps = false;
}
