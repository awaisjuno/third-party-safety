<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table = 'finance';
    protected $primaryKey = 'finance_id';
    public $timestamps = false;

    protected $fillable = [
        'finance_title',
        'finance_description',
        'create_date',
        'create_by',
        'type_id',
        'is_approved',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function type()
    {
        return $this->belongsTo(FinanceType::class, 'type_id');
    }
}
