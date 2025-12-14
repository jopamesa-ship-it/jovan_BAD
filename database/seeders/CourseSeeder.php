<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'course_code' => 'CS 301',
                'course_name' => 'Data Structures & Algorithms',
                'units' => 3,
                'capacity' => 40,
                'enrolled_count' => 28,
                'instructor_name' => 'Dr. Sarah Johnson',
                'schedule' => 'MWF 10:00 AM - 11:30 AM',
                'room' => 'Room 204',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 305',
                'course_name' => 'Database Management Systems',
                'units' => 3,
                'capacity' => 35,
                'enrolled_count' => 30,
                'instructor_name' => 'Prof. Michael Chen',
                'schedule' => 'TTh 2:00 PM - 3:30 PM',
                'room' => 'Room 301',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 320',
                'course_name' => 'Web Development',
                'units' => 3,
                'capacity' => 30,
                'enrolled_count' => 22,
                'instructor_name' => 'Dr. Emily Rodriguez',
                'schedule' => 'MWF 1:00 PM - 2:30 PM',
                'room' => 'Lab 105',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 401',
                'course_name' => 'Software Engineering',
                'units' => 4,
                'capacity' => 25,
                'enrolled_count' => 18,
                'instructor_name' => 'Dr. James Miller',
                'schedule' => 'MW 3:00 PM - 5:00 PM',
                'room' => 'Room 402',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 350',
                'course_name' => 'Operating Systems',
                'units' => 3,
                'capacity' => 30,
                'enrolled_count' => 25,
                'instructor_name' => 'Prof. Lisa Anderson',
                'schedule' => 'TTh 10:00 AM - 11:30 AM',
                'room' => 'Room 305',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 410',
                'course_name' => 'Artificial Intelligence',
                'units' => 4,
                'capacity' => 35,
                'enrolled_count' => 32,
                'instructor_name' => 'Dr. Robert Kim',
                'schedule' => 'MWF 9:00 AM - 10:30 AM',
                'room' => 'Lab 201',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 325',
                'course_name' => 'Mobile App Development',
                'units' => 3,
                'capacity' => 28,
                'enrolled_count' => 20,
                'instructor_name' => 'Prof. Maria Garcia',
                'schedule' => 'TTh 1:00 PM - 2:30 PM',
                'room' => 'Lab 103',
                'semester' => 'Fall',
                'year' => 2025,
            ],
            [
                'course_code' => 'CS 370',
                'course_name' => 'Computer Networks',
                'units' => 3,
                'capacity' => 32,
                'enrolled_count' => 27,
                'instructor_name' => 'Dr. Thomas Lee',
                'schedule' => 'MW 11:00 AM - 12:30 PM',
                'room' => 'Room 308',
                'semester' => 'Fall',
                'year' => 2025,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
