<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Training;

class Enrollement extends Model
{
    use HasFactory;

    protected $table = 'enrollment';

    protected $primaryKey = 'enrollment_id';

    public $timestamps = false;

    // The user who enrolled
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // The training related to enrollment
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id', 'training_id');
    }

    // The certificate related to this enrollment
    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'enrollment_id', 'enrollment_id');
    }
}
