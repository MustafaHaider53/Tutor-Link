<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'profile_picture',
        'location',
        'subjects_taught',
        'teaching_style',
        'availability_days',
        'hourly_rate'
    ];

    // Define the relationship with the Tuition model
    public function tuitions()
    {
        return $this->hasMany(Tuition::class);
    }

    // Define the many-to-many relationship with the Student model through the tuitions table
    public function students()
    {
        return $this->belongsToMany(Student::class, 'tuitions');
    }
}
