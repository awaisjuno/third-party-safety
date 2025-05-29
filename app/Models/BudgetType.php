<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetType extends Model
{
    use HasFactory;
        protected $table = 'budget_type';
        protected $fillable = ['name'];
        public $timestamps = false;
}
