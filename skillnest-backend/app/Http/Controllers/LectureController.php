<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LectureController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'course_id' => 'required|string'
        ]);

        $lectures = Lecture::where('course_id', $request->course_id)
            ->orderBy('order_index')
            ->get();

        return response()->json($lectures);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|string',
            'title' => 'required|string|max:255',
            'duration' => 'required|string',
            'description' => 'nullable|string',
            'order_index' => 'nullable|integer',
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

        // Authorize: course must belong to current user
        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $orderIndex = $request->order_index;
        if (!$orderIndex) {
            $maxOrder = Lecture::where('course_id', $request->course_id)->max('order_index');
            $orderIndex = $maxOrder ? $maxOrder + 1 : 1;
        }

        $lecture = Lecture::create([
            'id' => 'l' . time() . rand(10, 99),
            'course_id' => $request->course_id,
            'title' => $request->title,
            'duration' => $request->duration,
            'order_index' => $orderIndex,
            'description' => $request->description ?? '',
        ]);

        return response()->json([
            'success' => true,
            'lecture' => $lecture
        ]);
    }

    public function update(Request $request, $id)
    {
        $lecture = Lecture::find($id);
        if (!$lecture) {
            return response()->json(['message' => 'Lecture not found'], 404);
        }

        $course = Course::find($lecture->course_id);
        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $lecture->update($request->only(['title', 'duration', 'description', 'order_index']));

        return response()->json([
            'success' => true,
            'lecture' => $lecture
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $lecture = Lecture::find($id);
        if (!$lecture) {
            return response()->json(['message' => 'Lecture not found'], 404);
        }

        $course = Course::find($lecture->course_id);
        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $lecture->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lecture deleted'
        ]);
    }
}
