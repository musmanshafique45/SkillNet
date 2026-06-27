<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with('teacher');

        if ($request->has('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        } else {
            // By default, if not teacher/admin requesting specific list, only show published
            // But if there's no auth user, or simple frontend fetching, show published.
            // Let's check if the requester is requesting their own or if we just filter by role.
            if (!$request->has('all')) {
                $query->where('status', 'published');
            }
        }

        $courses = $query->get();
        return response()->json($courses);
    }

    public function show($id)
    {
        $course = Course::with(['teacher', 'lectures', 'quizzes.questions'])->find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        return response()->json($course);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|string',
            'category' => 'required|string',
            'level' => 'required|string',
            'price' => 'required|numeric',
            'tags' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $requireApprovalSetting = Setting::where('key', 'require_approval')->first();
        $requireApproval = $requireApprovalSetting ? filter_var($requireApprovalSetting->value, FILTER_VALIDATE_BOOLEAN) : false;
        $status = $requireApproval ? 'pending' : 'published';

        $course = Course::create([
            'id' => 'c' . time() . rand(10, 99),
            'teacher_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail ?? '',
            'category' => $request->category,
            'level' => $request->level,
            'price' => $request->price,
            'status' => $status,
            'rating' => 0,
            'students' => 0,
            'tags' => $request->tags ?? [],
            'created_at_custom' => date('Y-m-d'),
        ]);

        return response()->json([
            'success' => true,
            'course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        // Authorize: course must belong to user, or user is admin
        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $course->update($request->only([
            'title', 'description', 'thumbnail', 'category', 'level', 'price', 'tags', 'status'
        ]));

        return response()->json([
            'success' => true,
            'course' => $course
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        if ($course->teacher_id !== $request->user()->id && $request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        // Admin only
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $course = Course::find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:published,pending,draft,archived,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        $course->status = $request->status;
        $course->save();

        return response()->json([
            'success' => true,
            'course' => $course
        ]);
    }
}
