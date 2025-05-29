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
        'is_active',
        'is_delete',
    ];

    public $timestamps = false;
}
