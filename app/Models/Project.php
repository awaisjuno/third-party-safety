<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_title',
        'project_description',
        'project_type',
        'service_id',
        'starting_date',
        'delivery_date',
        'assign_to',
        'is_done',
    ];

    public $timestamps = false;
}