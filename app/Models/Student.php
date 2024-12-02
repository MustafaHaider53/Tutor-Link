<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

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

    public function tuitions()
    {
        return $this->hasMany(Tuition::class);
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tuitions');
    }


}
