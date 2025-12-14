<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Display all enrolled courses for the student
    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses()->get();
        
        return view('studentdashboard.my-courses', compact('courses'));
    }

    // Display all available courses for browsing
    public function browseCourses()
    {
        $courses = Course::all();
        
        return view('studentdashboard.browse-courses', compact('courses'));
    }

    // Display student's schedule
    public function schedule()
    {
        $user = Auth::user();
        $courses = $user->courses()->get();
        
        return view('studentdashboard.schedule', compact('courses'));
    }

    // Display student's grades
    public function grades()
    {
        $user = Auth::user();
        $courses = $user->courses()->get();
        
        // Calculate GPA and stats
        $totalUnits = $courses->sum('units');
        $completedCourses = $courses->count();
        
        // Sample GPA calculation (in real app, would use actual grades from database)
        $gpa = 3.85;
        
        return view('studentdashboard.grades', compact('courses', 'gpa', 'totalUnits', 'completedCourses'));
    }

    // Display student's transcript
    public function transcript()
    {
        $user = Auth::user();
        $courses = $user->courses()->get();
        
        return view('studentdashboard.transcript', compact('courses'));
    }

    // Display student's tuition information
    public function tuition()
    {
        $user = Auth::user();
        $courses = $user->courses()->get();
        
        return view('studentdashboard.tuition', compact('courses'));
    }

    // Enroll student in a course
    public function enroll(Request $request, $courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        // Check if already enrolled
        if ($user->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        // Check if course is full
        if ($course->isFull()) {
            return redirect()->back()->with('error', 'This course is full.');
        }

        // Enroll student
        $user->courses()->attach($courseId);
        
        // Update enrolled count
        $course->increment('enrolled_count');

        return redirect()->back()->with('success', 'Successfully enrolled in ' . $course->course_name);
    }

    // Drop a course
    public function drop($courseId)
    {
        $user = Auth::user();
        $course = Course::findOrFail($courseId);

        // Check if enrolled
        if (!$user->courses()->where('course_id', $courseId)->exists()) {
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }

        // Drop course
        $user->courses()->detach($courseId);
        
        // Update enrolled count
        $course->decrement('enrolled_count');

        return redirect()->back()->with('success', 'Successfully dropped ' . $course->course_name);
    }

    // Show notifications page
    public function notifications()
    {
        return view('studentdashboard.notifications');
    }
}
