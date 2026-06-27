<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DatabaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::get('/lectures', [LectureController::class, 'index']);
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/{id}', [QuizController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/settings', [SettingController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/db/all', [DatabaseController::class, 'getAll']);

// Protected routes (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    
    // User profile and management
    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::put('/users/{id}/status', [UserController::class, 'updateStatus']);
    
    // Course management
    Route::post('/courses', [CourseController::class, 'store']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::put('/courses/{id}/status', [CourseController::class, 'updateStatus']);
    
    // Lecture management
    Route::post('/lectures', [LectureController::class, 'store']);
    Route::put('/lectures/{id}', [LectureController::class, 'update']);
    Route::delete('/lectures/{id}', [LectureController::class, 'destroy']);
    
    // Enrollments
    Route::get('/enrollments', [EnrollmentController::class, 'index']);
    Route::post('/enrollments', [EnrollmentController::class, 'store']);
    Route::put('/enrollments/{id}', [EnrollmentController::class, 'update']);
    
    // Quiz management
    Route::post('/quizzes', [QuizController::class, 'store']);
    Route::post('/questions', [QuizController::class, 'storeQuestion']);
    Route::delete('/questions/{id}', [QuizController::class, 'deleteQuestion']);
    
    // Quiz attempts
    Route::get('/quiz-attempts', [QuizAttemptController::class, 'index']);
    Route::post('/quiz-attempts', [QuizAttemptController::class, 'store']);
    
    // Settings management
    Route::put('/settings', [SettingController::class, 'update']);
=======
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
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
});
