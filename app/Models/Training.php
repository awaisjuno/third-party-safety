<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'training_id';
    protected $fillable = [
        'training_name',
        'training_description',
        'img',
        'duration',
    ];

    public $timestamps = false;
}
