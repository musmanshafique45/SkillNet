<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Models\Question;

// ==========================================
// SKILLNEST BACKEND API ROUTES
// ==========================================

Route::get('/users', function () {
    return response()->json(User::all());
});

Route::get('/courses', function () {
    return response()->json(Course::all());
});

Route::get('/courses/{id}', function ($id) {
    return response()->json(Course::find($id));
});

// Fetch lectures for a specific course
Route::get('/lectures', function (Request $request) {
    if ($request->has('course_id')) {
        return response()->json(Lecture::where('course_id', $request->course_id)->orderBy('order_index')->get());
    }
    return response()->json(Lecture::all());
});

// Fetch enrollments (optionally filter by student)
Route::get('/enrollments', function (Request $request) {
    if ($request->has('student_id')) {
        return response()->json(Enrollment::where('student_id', $request->student_id)->get());
    }
    return response()->json(Enrollment::all());
});

// Fetch quizzes for a course
Route::get('/quizzes', function (Request $request) {
    if ($request->has('course_id')) {
        return response()->json(Quiz::where('course_id', $request->course_id)->get());
    }
    return response()->json(Quiz::all());
});

// Fetch questions for a quiz
Route::get('/questions', function (Request $request) {
    if ($request->has('quiz_id')) {
        return response()->json(Question::where('quiz_id', $request->quiz_id)->get());
    }
    return response()->json(Question::all());
});

// Simple Login Endpoint (Mocking real auth for now to match your frontend)
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    // Since we are mocking, we just check if user exists. 
    // In production, we would use Hash::check($request->password, $user->password)
    if ($user) {
        return response()->json(['success' => true, 'user' => $user]);
    }
    return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
});
