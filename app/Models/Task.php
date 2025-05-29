<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $primaryKey = 'task_id';

    public $timestamps = false;

    protected $fillable = [
        'task_title',
        'task_description',
        'ref_img',
        'ref_url',
        'assign_date',
        'end_date',
        'month',
        'assign_to',
        'project_id',
        'is_done',
    ];

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1)->where('is_delete', 0);
    }

    public function scopePending($query)
    {
        return $query->where('is_done', 0);
    }

    public function scopeCompleted($query)
    {
        return $query->where('is_done', 1);
    }
}
