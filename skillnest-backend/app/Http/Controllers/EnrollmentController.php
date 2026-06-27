<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Enrollment::with('course');

        if ($request->has('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        if ($request->has('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        $enrollments = $query->get();
        return response()->json($enrollments);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $studentId = $request->user()->id;
        $courseId = $request->course_id;

        // Check if already enrolled
        $existing = Enrollment::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Already enrolled in this course.'
            ], 400);
        }

        $course = Course::find($courseId);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $enrollment = Enrollment::create([
            'id' => 'e' . time() . rand(10, 99),
            'student_id' => $studentId,
            'course_id' => $courseId,
            'progress' => 0,
            'completed_lectures' => [],
            'last_lecture' => null,
            'completed' => false,
            'enrolled_at' => date('Y-m-d'),
        ]);

        // Increment student count for course
        $course->increment('students');

        return response()->json([
            'success' => true,
            'enrollment' => $enrollment
        ]);
    }

    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::find($id);
        if (!$enrollment) {
            return response()->json(['message' => 'Enrollment not found'], 404);
        }

        // Authorize: must be the student or admin
        if ($enrollment->student_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validator = Validator::make($request->all(), [
            'progress' => 'nullable|integer',
            'completed_lectures' => 'nullable|array',
            'last_lecture' => 'nullable|string',
            'completed' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        $enrollment->update($request->only(['progress', 'completed_lectures', 'last_lecture', 'completed']));

        return response()->json([
            'success' => true,
            'enrollment' => $enrollment
        ]);
    }
}
