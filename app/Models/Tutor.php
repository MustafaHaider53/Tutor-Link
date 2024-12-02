<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'subjects_taught',
        'teaching_style',
        'availability_days',
        'hourly_rate'
    ];

    public function tuitions()
    {
        return $this->hasMany(Tuition::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'tuitions');
    }
}
