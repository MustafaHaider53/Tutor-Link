<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = ['tutor_id', 'student_id'];

    // Define the relationship with the Tutor model
    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
