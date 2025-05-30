<?php

use App\Models\User;
use App\Models\Training;

class Enrollement extends Model
{
    use HasFactory;

    protected $table = 'enrollment';
    protected $primaryKey = 'enrollment_id';

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
}
