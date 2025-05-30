<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';

    protected $fillable = [
        'training_name',
        'training_description',
        'duration',
    ];

    public $timestamps = false;
}
