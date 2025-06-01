<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollement;

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
     * Define relationship to Enrollment model.
     * Each certificate belongs to one enrollment.
     */
    public function enrollment()
    {
        return $this->belongsTo(Enrollement::class, 'enrollment_id', 'enrollment_id');
    }
}
