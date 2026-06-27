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
use App\Models\QuizAttempt;
use App\Models\Category;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Categories
        $categories = [
            ['id' => 'cat1', 'name' => 'Web Development', 'icon' => '💻', 'color' => '#6366F1', 'count' => 3],
            ['id' => 'cat2', 'name' => 'Data Science', 'icon' => '📊', 'color' => '#10B981', 'count' => 1],
            ['id' => 'cat3', 'name' => 'Design', 'icon' => '🎨', 'color' => '#F59E0B', 'count' => 2],
            ['id' => 'cat4', 'name' => 'Backend', 'icon' => '⚙️', 'color' => '#3B82F6', 'count' => 1],
            ['id' => 'cat5', 'name' => 'Mobile', 'icon' => '📱', 'color' => '#8B5CF6', 'count' => 0],
            ['id' => 'cat6', 'name' => 'DevOps', 'icon' => '🚀', 'color' => '#EC4899', 'count' => 0],
        ];
        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 2. Seed Users
        $users = [
            [
                'id' => 'u1',
                'name' => 'M Usman Shafique',
                'email' => 'student@demo.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'avatar' => '',
                'bio' => 'Passionate learner exploring web development.',
                'status' => 'active',
                'created_at' => '2026-01-10 00:00:00'
            ],
            [
                'id' => 'u2',
                'name' => 'M Usman Shafique',
                'email' => 'teacher@demo.com',
                'password' => Hash::make('password123'),
                'role' => 'teacher',
                'avatar' => '',
                'bio' => 'Full-stack developer with 8 years of experience teaching online.',
                'status' => 'active',
                'created_at' => '2025-12-01 00:00:00'
            ],
            [
                'id' => 'u3',
                'name' => 'Admin User',
                'email' => 'admin@demo.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'avatar' => '',
                'bio' => 'Platform administrator.',
                'status' => 'active',
                'created_at' => '2025-11-01 00:00:00'
            ],
            [
                'id' => 'u4',
                'name' => 'M Usman Shafique',
                'email' => 'usman@demo.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'avatar' => '',
                'bio' => '',
                'status' => 'active',
                'created_at' => '2026-02-14 00:00:00'
            ],
            [
                'id' => 'u5',
                'name' => 'M Usman Shafique',
                'email' => 'usman1@demo.com',
                'password' => Hash::make('password123'),
                'role' => 'teacher',
                'avatar' => '',
                'bio' => 'UI/UX designer and React expert.',
                'status' => 'active',
                'created_at' => '2026-01-20 00:00:00'
            ],
            [
                'id' => 'u6',
                'name' => 'M Usman Shafique',
                'email' => 'usman2@demo.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'avatar' => '',
                'bio' => '',
                'status' => 'inactive',
                'created_at' => '2026-03-05 00:00:00'
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }

        // 3. Seed Courses
        $courses = [
            [
                'id' => 'c1',
                'teacher_id' => 'u2',
                'title' => 'Complete Web Development Bootcamp',
                'description' => 'Master HTML, CSS, JavaScript, React, Node.js, and MongoDB in this comprehensive bootcamp. Build 15 real-world projects and launch your web development career.',
                'thumbnail' => 'https://images.unsplash.com/photo-1593720213428-28a5b9e94613?w=600&q=80',
                'category' => 'Web Development',
                'level' => 'Beginner',
                'price' => 0,
                'status' => 'published',
                'rating' => 4.8,
                'students' => 1240,
                'tags' => ['HTML', 'CSS', 'JavaScript', 'React'],
                'created_at_custom' => '2026-01-15'
            ],
            [
                'id' => 'c2',
                'teacher_id' => 'u2',
                'title' => 'Advanced React & Redux Mastery',
                'description' => 'Deep dive into React hooks, context, Redux Toolkit, testing, and performance optimization. Build production-ready applications with modern React patterns.',
                'thumbnail' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=600&q=80',
                'category' => 'Web Development',
                'level' => 'Advanced',
                'price' => 49,
                'status' => 'published',
                'rating' => 4.9,
                'students' => 876,
                'tags' => ['React', 'Redux', 'TypeScript'],
                'created_at_custom' => '2026-02-01'
            ],
            [
                'id' => 'c3',
                'teacher_id' => 'u2',
                'title' => 'Python for Data Science & ML',
                'description' => 'Learn Python, NumPy, Pandas, Matplotlib, and Scikit-learn. Analyze real datasets and build machine learning models from scratch.',
                'thumbnail' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=600&q=80',
                'category' => 'Data Science',
                'level' => 'Intermediate',
                'price' => 29,
                'status' => 'published',
                'rating' => 4.7,
                'students' => 2100,
                'tags' => ['Python', 'ML', 'Data Science'],
                'created_at_custom' => '2026-01-20'
            ],
            [
                'id' => 'c4',
                'teacher_id' => 'u5',
                'title' => 'UI/UX Design: From Wireframe to Prototype',
                'description' => 'Master the complete design process — user research, wireframing, prototyping in Figma, and usability testing. Create stunning interfaces that users love.',
                'thumbnail' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&q=80',
                'category' => 'Design',
                'level' => 'Beginner',
                'price' => 0,
                'status' => 'published',
                'rating' => 4.6,
                'students' => 940,
                'tags' => ['Figma', 'UX', 'Design'],
                'created_at_custom' => '2026-02-10'
            ],
            [
                'id' => 'c5',
                'teacher_id' => 'u5',
                'title' => 'Mobile App Design with Figma',
                'description' => 'Design beautiful, user-centered mobile applications using Figma. Learn component libraries, auto-layout, prototyping, and developer handoff.',
                'thumbnail' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&q=80',
                'category' => 'Design',
                'level' => 'Intermediate',
                'price' => 39,
                'status' => 'published',
                'rating' => 4.5,
                'students' => 450,
                'tags' => ['Figma', 'Mobile', 'UI'],
                'created_at_custom' => '2026-03-01'
            ],
            [
                'id' => 'c6',
                'teacher_id' => 'u2',
                'title' => 'Node.js & Express Backend Development',
                'description' => 'Build scalable REST APIs with Node.js, Express, PostgreSQL, and JWT authentication. Deploy to cloud with CI/CD pipelines.',
                'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80',
                'category' => 'Backend',
                'level' => 'Intermediate',
                'price' => 35,
                'status' => 'pending',
                'rating' => 4.8,
                'students' => 0,
                'tags' => ['Node.js', 'Express', 'PostgreSQL'],
                'created_at_custom' => '2026-04-01'
            ],
        ];
        foreach ($courses as $course) {
            Course::create($course);
        }

        // 4. Seed Lectures
        $lectures = [
            ['id' => 'l1', 'course_id' => 'c1', 'title' => 'Welcome & Course Overview', 'duration' => '5:20', 'order_index' => 1, 'description' => 'Introduction to what you will learn in this course.'],
            ['id' => 'l2', 'course_id' => 'c1', 'title' => 'Setting Up Your Development Environment', 'duration' => '12:45', 'order_index' => 2, 'description' => 'Install VS Code, Node.js, and configure Git.'],
            ['id' => 'l3', 'course_id' => 'c1', 'title' => 'HTML Fundamentals & Semantic Markup', 'duration' => '28:10', 'order_index' => 3, 'description' => 'Learn the building blocks of the web.'],
            ['id' => 'l4', 'course_id' => 'c1', 'title' => 'CSS Styling & Box Model', 'duration' => '34:55', 'order_index' => 4, 'description' => 'Style your pages with CSS. Master the box model and layout.'],
            ['id' => 'l5', 'course_id' => 'c1', 'title' => 'CSS Flexbox & Grid Layouts', 'duration' => '42:30', 'order_index' => 5, 'description' => 'Build complex responsive layouts.'],
            ['id' => 'l6', 'course_id' => 'c1', 'title' => 'JavaScript Basics & DOM', 'duration' => '51:15', 'order_index' => 6, 'description' => 'Variables, functions, events, and DOM manipulation.'],
            ['id' => 'l7', 'course_id' => 'c1', 'title' => 'Async JS: Promises & Fetch API', 'duration' => '38:00', 'order_index' => 7, 'description' => 'Handle async operations and API calls.'],
            ['id' => 'l8', 'course_id' => 'c1', 'title' => 'Introduction to React', 'duration' => '45:20', 'order_index' => 8, 'description' => 'Components, props, state, and hooks.'],
            ['id' => 'l9', 'course_id' => 'c2', 'title' => 'React Hooks Deep Dive', 'duration' => '55:10', 'order_index' => 1, 'description' => 'useState, useEffect, useRef, useMemo, useCallback.'],
            ['id' => 'l10', 'course_id' => 'c2', 'title' => 'Context API & State Management', 'duration' => '48:30', 'order_index' => 2, 'description' => 'Managing global state without Redux.'],
            ['id' => 'l11', 'course_id' => 'c2', 'title' => 'Redux Toolkit Fundamentals', 'duration' => '62:00', 'order_index' => 3, 'description' => 'Modern Redux with RTK and createSlice.'],
            ['id' => 'l12', 'course_id' => 'c3', 'title' => 'Python Basics Review', 'duration' => '30:00', 'order_index' => 1, 'description' => 'Data types, loops, functions, OOP.'],
            ['id' => 'l13', 'course_id' => 'c3', 'title' => 'NumPy for Numerical Computing', 'duration' => '44:15', 'order_index' => 2, 'description' => 'Arrays, broadcasting, and matrix ops.'],
            ['id' => 'l14', 'course_id' => 'c4', 'title' => 'Introduction to UX Design', 'duration' => '22:10', 'order_index' => 1, 'description' => 'UX principles, design thinking.'],
            ['id' => 'l15', 'course_id' => 'c4', 'title' => 'User Research Methods', 'duration' => '35:40', 'order_index' => 2, 'description' => 'Interviews, surveys, personas.'],
            ['id' => 'l16', 'course_id' => 'c4', 'title' => 'Wireframing with Figma', 'duration' => '48:20', 'order_index' => 3, 'description' => 'Low and high-fidelity wireframes.'],
        ];
        foreach ($lectures as $lec) {
            Lecture::create($lec);
        }

        // 5. Seed Enrollments
        $enrollments = [
            ['id' => 'e1', 'student_id' => 'u1', 'course_id' => 'c1', 'progress' => 62, 'enrolled_at' => '2026-02-01', 'completed_lectures' => ['l1', 'l2', 'l3', 'l4', 'l5'], 'last_lecture' => 'l6', 'completed' => false],
            ['id' => 'e2', 'student_id' => 'u1', 'course_id' => 'c2', 'progress' => 33, 'enrolled_at' => '2026-03-10', 'completed_lectures' => ['l9'], 'last_lecture' => 'l10', 'completed' => false],
            ['id' => 'e3', 'student_id' => 'u1', 'course_id' => 'c4', 'progress' => 100, 'enrolled_at' => '2026-01-20', 'completed_lectures' => ['l14', 'l15', 'l16'], 'last_lecture' => 'l16', 'completed' => true],
            ['id' => 'e4', 'student_id' => 'u4', 'course_id' => 'c1', 'progress' => 87, 'enrolled_at' => '2026-01-25', 'completed_lectures' => ['l1', 'l2', 'l3', 'l4', 'l5', 'l6', 'l7'], 'last_lecture' => 'l8', 'completed' => false],
            ['id' => 'e5', 'student_id' => 'u4', 'course_id' => 'c3', 'progress' => 45, 'enrolled_at' => '2026-02-28', 'completed_lectures' => ['l12'], 'last_lecture' => 'l13', 'completed' => false],
            ['id' => 'e6', 'student_id' => 'u6', 'course_id' => 'c2', 'progress' => 10, 'enrolled_at' => '2026-03-20', 'completed_lectures' => [], 'last_lecture' => 'l9', 'completed' => false],
        ];
        foreach ($enrollments as $enr) {
            Enrollment::create($enr);
        }

        // 6. Seed Quizzes
        $quizzes = [
            ['id' => 'q1', 'course_id' => 'c1', 'title' => 'HTML & CSS Fundamentals Quiz', 'time_limit' => 15, 'max_attempts' => 3],
            ['id' => 'q2', 'course_id' => 'c1', 'title' => 'JavaScript Basics Assessment', 'time_limit' => 20, 'max_attempts' => 3],
            ['id' => 'q3', 'course_id' => 'c2', 'title' => 'React Hooks Mastery Test', 'time_limit' => 25, 'max_attempts' => 2],
            ['id' => 'q4', 'course_id' => 'c4', 'title' => 'UX Design Principles Quiz', 'time_limit' => 10, 'max_attempts' => 3],
        ];
        foreach ($quizzes as $quiz) {
            Quiz::create($quiz);
        }

        // 7. Seed Questions
        $questions = [
            ['id' => 'qn1', 'quiz_id' => 'q1', 'type' => 'mcq', 'question_text' => 'Which HTML tag is used to define the largest heading?', 'options' => ['<h6>', '<h1>', '<header>', '<head>'], 'correct_answer' => '1'],
            ['id' => 'qn2', 'quiz_id' => 'q1', 'type' => 'mcq', 'question_text' => 'Which CSS property controls the text size?', 'options' => ['font-style', 'text-size', 'font-size', 'text-style'], 'correct_answer' => '2'],
            ['id' => 'qn3', 'quiz_id' => 'q1', 'type' => 'tf', 'question_text' => 'CSS Flexbox is a one-dimensional layout method.', 'options' => ['True', 'False'], 'correct_answer' => '0'],
            ['id' => 'qn4', 'quiz_id' => 'q1', 'type' => 'mcq', 'question_text' => 'What does the CSS "box model" include?', 'options' => ['Content only', 'Content, padding, border, margin', 'Content and margin only', 'Border and padding only'], 'correct_answer' => '1'],
            ['id' => 'qn5', 'quiz_id' => 'q1', 'type' => 'mcq', 'question_text' => 'Which selector targets an element with id="main"?', 'options' => ['.main', '#main', '*main', 'main'], 'correct_answer' => '1'],
            ['id' => 'qn6', 'quiz_id' => 'q2', 'type' => 'mcq', 'question_text' => 'What keyword declares a block-scoped variable in JavaScript?', 'options' => ['var', 'let', 'def', 'int'], 'correct_answer' => '1'],
            ['id' => 'qn7', 'quiz_id' => 'q2', 'type' => 'tf', 'question_text' => 'JavaScript is a statically typed language.', 'options' => ['True', 'False'], 'correct_answer' => '1'],
            ['id' => 'qn8', 'quiz_id' => 'q2', 'type' => 'mcq', 'question_text' => 'Which method adds an element to the end of an array?', 'options' => ['push()', 'pop()', 'shift()', 'unshift()'], 'correct_answer' => '0'],
            ['id' => 'qn9', 'quiz_id' => 'q3', 'type' => 'mcq', 'question_text' => 'Which hook is used to manage side effects in React?', 'options' => ['useState', 'useEffect', 'useReducer', 'useContext'], 'correct_answer' => '1'],
            ['id' => 'qn10', 'quiz_id' => 'q3', 'type' => 'mcq', 'question_text' => 'What is the second argument to useEffect?', 'options' => ['A callback', 'A dependency array', 'A state value', 'A ref'], 'correct_answer' => '1'],
            ['id' => 'qn11', 'quiz_id' => 'q4', 'type' => 'mcq', 'question_text' => 'What does UX stand for?', 'options' => ['User Experience', 'User Extension', 'Unified Exchange', 'User Execution'], 'correct_answer' => '0'],
            ['id' => 'qn12', 'quiz_id' => 'q4', 'type' => 'tf', 'question_text' => 'A wireframe is a high-fidelity design prototype.', 'options' => ['True', 'False'], 'correct_answer' => '1'],
        ];
        foreach ($questions as $q) {
            Question::create($q);
        }

        // 8. Seed Quiz Attempts
        $quiz_attempts = [
            ['id' => 'a1', 'student_id' => 'u1', 'quiz_id' => 'q4', 'score' => 100, 'answers' => ['qn11' => 0, 'qn12' => 1], 'submitted_at' => '2026-02-15 00:00:00', 'passed' => true],
        ];
        foreach ($quiz_attempts as $qa) {
            QuizAttempt::create($qa);
        }

        // 9. Seed Settings
        $settings = [
            'platform_name' => 'SkillNest',
            'platform_tagline' => 'Learn Without Limits',
            'logo_url' => '',
            'support_email' => 'support@skillnest.io',
            'allow_registration' => 'true',
            'require_approval' => 'false',
            'maintenance_mode' => 'false',
        ];
        foreach ($settings as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }
    }
}
