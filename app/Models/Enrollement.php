<?php

namespace App\Models;

use App\Models\User;
use App\Models\Training;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollement extends Model
{
    use HasFactory;

    protected $table = 'enrollment';
    protected $primaryKey = 'enrollment_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'training_id', 'enroll_date', 'is_paid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'user_id');
    }
}
