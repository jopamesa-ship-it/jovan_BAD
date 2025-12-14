<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code',
        'course_name',
        'units',
        'capacity',
        'enrolled_count',
        'instructor_name',
        'schedule',
        'room',
        'semester',
        'year'
    ];

    // Relationship with users (students enrolled)
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
                    ->withTimestamps();
    }

    // Check if course is full
    public function isFull()
    {
        return $this->enrolled_count >= $this->capacity;
    }

    // Get available slots
    public function availableSlots()
    {
        return $this->capacity - $this->enrolled_count;
    }
}
