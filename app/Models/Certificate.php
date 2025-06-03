<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollement;
use App\Models\User;
use App\Models\Training;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificate';
    protected $primaryKey = 'certificate_id';
    public $timestamps = false;

    protected $fillable = [
        'enrollment_id',
        'create_date',
        'pass_date',
        'total_marks',
        'unique_id'
    ];

    /**
     * Each certificate belongs to one enrollment.
     */
    public function enrollment()
    {
        return $this->belongsTo(Enrollement::class, 'enrollment_id', 'enrollment_id');
    }

    /**
     * Access the user through the enrollment relationship.
     */
    public function user()
    {
        // Assuming Enrollement model has a 'user' relationship defined.
        return $this->hasOneThrough(User::class, Enrollement::class, 'enrollment_id', 'user_id', 'enrollment_id', 'user_id');
    }

    /**
     * Access the training through the enrollment relationship.
     */
    public function training()
    {
        // Assuming Enrollement model has a 'training' relationship defined.
        return $this->hasOneThrough(Training::class, Enrollement::class, 'enrollment_id', 'training_id', 'enrollment_id', 'training_id');
    }
}