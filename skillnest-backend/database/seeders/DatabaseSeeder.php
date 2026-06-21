<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Users
        User::insert([
            ['id' => 'u1', 'name' => 'M Usman Shafique', 'email' => 'student@demo.com', 'password' => Hash::make('password123'), 'role' => 'student', 'status' => 'active'],
            ['id' => 'u2', 'name' => 'M Usman Shafique', 'email' => 'teacher@demo.com', 'password' => Hash::make('password123'), 'role' => 'teacher', 'status' => 'active'],
            ['id' => 'u3', 'name' => 'Admin User', 'email' => 'admin@demo.com', 'password' => Hash::make('password123'), 'role' => 'admin', 'status' => 'active'],
        ]);

        // 2. Seed Courses
        Course::insert([
            [
                'id' => 'c1', 
                'teacher_id' => 'u2', 
                'title' => 'Complete Web Development Bootcamp', 
                'description' => 'Master HTML, CSS, JavaScript, React, Node.js, and MongoDB.',
                'category' => 'Web Development', 
                'level' => 'Beginner', 
                'price' => 0, 
                'status' => 'published', 
                'rating' => 4.8, 
                'tags' => json_encode(['HTML', 'CSS', 'JavaScript'])
            ],
            [
                'id' => 'c2', 
                'teacher_id' => 'u2', 
                'title' => 'Advanced React & Redux Mastery', 
                'description' => 'Deep dive into React hooks, context, Redux Toolkit.',
                'category' => 'Web Development', 
                'level' => 'Advanced', 
                'price' => 49, 
                'status' => 'published', 
                'rating' => 4.9, 
                'tags' => json_encode(['React', 'Redux'])
            ]
        ]);

        // 3. Seed Lectures
        Lecture::insert([
            ['id' => 'l1', 'course_id' => 'c1', 'title' => 'Introduction to HTML', 'duration' => '10:30', 'order_index' => 1],
            ['id' => 'l2', 'course_id' => 'c1', 'title' => 'CSS Fundamentals', 'duration' => '15:45', 'order_index' => 2],
        ]);

        // 4. Seed Enrollments
        Enrollment::insert([
            ['id' => 'e1', 'student_id' => 'u1', 'course_id' => 'c1', 'progress' => 100, 'completed' => true, 'completed_lectures' => json_encode(['l1', 'l2'])],
        ]);
        
        // 5. Seed Quizzes
        Quiz::insert([
            ['id' => 'q1', 'course_id' => 'c1', 'title' => 'HTML & CSS Basics', 'total_marks' => 20, 'passing_marks' => 15],
        ]);

        // 6. Seed Questions
        Question::insert([
            ['id' => 'qn1', 'quiz_id' => 'q1', 'text' => 'What does HTML stand for?', 'options' => json_encode(['Hyper Text Markup Language', 'High Tech Modern Language']), 'correct_option' => 'Hyper Text Markup Language'],
        ]);
    }
}
