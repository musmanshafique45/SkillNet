<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizAttempt;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function getAll()
    {
        // Get all tables data and return them structured as a single JSON object (similar to SEED_DATA)
        $users = User::all();
        $courses = Course::all();
        $lectures = Lecture::all();
        $enrollments = Enrollment::all();
        $quizzes = Quiz::all();
        $questions = Question::all();
        $quizAttempts = QuizAttempt::all();
        $categories = Category::all();
        
        $settingsRaw = Setting::all()->pluck('value', 'key')->toArray();
        $booleanKeys = ['allow_registration', 'require_approval', 'maintenance_mode'];
        foreach ($booleanKeys as $key) {
            if (isset($settingsRaw[$key])) {
                $settingsRaw[$key] = filter_var($settingsRaw[$key], FILTER_VALIDATE_BOOLEAN);
            }
        }

        return response()->json([
            'users' => $users,
            'courses' => $courses,
            'lectures' => $lectures,
            'enrollments' => $enrollments,
            'quizzes' => $quizzes,
            'questions' => $questions,
            'quiz_attempts' => $quizAttempts,
            'categories' => $categories,
            'settings' => $settingsRaw
        ]);
    }
}
