<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizAttemptController extends Controller
{
    public function index(Request $request)
    {
        $query = QuizAttempt::with('quiz');

        if ($request->has('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        if ($request->has('quiz_id')) {
            $query->where('quiz_id', $request->quiz_id);
        }

        $attempts = $query->get();
        return response()->json($attempts);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required|string',
            'score' => 'required|integer',
            'answers' => 'required|array',
            'passed' => 'required|boolean',
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

        $attempt = QuizAttempt::create([
            'id' => 'a' . time() . rand(10, 99),
            'student_id' => $request->user()->id,
            'quiz_id' => $request->quiz_id,
            'score' => $request->score,
            'answers' => $request->answers,
            'passed' => $request->passed,
            'submitted_at' => date('Y-m-d H:i:s'),
        ]);

        return response()->json([
            'success' => true,
            'attempt' => $attempt
        ]);
    }
}
