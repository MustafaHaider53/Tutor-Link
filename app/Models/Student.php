<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'subjects_needed',
        'learning_style',
        'availability_days',
        'notes'
    ];

    // Define the relationship with the Tuition model
    public function tuitions()
    {
        return $this->hasMany(Tuition::class);
    }

    // Define the many-to-many relationship with the Tutor model through the tuitions table
    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tuitions');
    }
}
