<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $query = Quiz::query();

        if ($request->has('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        $quizzes = $query->with('questions')->get();
        return response()->json($quizzes);
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions')->find($id);
        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }
        return response()->json($quiz);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|string',
            'title' => 'required|string|max:255',
            'time_limit' => 'required|integer',
            'max_attempts' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $course = Course::find($request->course_id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $quiz = Quiz::create([
            'id' => 'q' . time() . rand(10, 99),
            'course_id' => $request->course_id,
            'title' => $request->title,
            'time_limit' => $request->time_limit,
            'max_attempts' => $request->max_attempts,
        ]);

        return response()->json([
            'success' => true,
            'quiz' => $quiz
        ]);
    }

    public function storeQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required|string',
            'type' => 'required|string|in:mcq,tf,short',
            'question_text' => 'required|string',
            'options' => 'nullable|array',
            'correct_answer' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $quiz = Quiz::find($request->quiz_id);
        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        $course = Course::find($quiz->course_id);
        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $question = Question::create([
            'id' => 'qn' . time() . rand(10, 99),
            'quiz_id' => $request->quiz_id,
            'type' => $request->type,
            'question_text' => $request->question_text,
            'options' => $request->options ?? [],
            'correct_answer' => $request->correct_answer,
        ]);

        return response()->json([
            'success' => true,
            'question' => $question
        ]);
    }

    public function deleteQuestion(Request $request, $id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        $quiz = Quiz::find($question->quiz_id);
        $course = Course::find($quiz->course_id);

        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $question->delete();

        return response()->json([
            'success' => true,
            'message' => 'Question deleted'
        ]);
    }
}
