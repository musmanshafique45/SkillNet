<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;

Route::get('/', function () {
    $categories = [
        ['name' => 'Web Development', 'icon' => '💻', 'count' => 42, 'color' => '#3B82F6'],
        ['name' => 'Design', 'icon' => '🎨', 'count' => 28, 'color' => '#A855F7'],
        ['name' => 'Data Science', 'icon' => '📊', 'count' => 18, 'color' => '#10B981'],
        ['name' => 'Marketing', 'icon' => '📈', 'count' => 15, 'color' => '#F59E0B'],
        ['name' => 'Photography', 'icon' => '📸', 'count' => 12, 'color' => '#EC4899'],
        ['name' => 'Business', 'icon' => '💼', 'count' => 35, 'color' => '#6366F1']
    ];

    $featuredCourses = Course::where('status', 'published')->take(3)->get();

    return view('home', compact('categories', 'featuredCourses'));
});

// Auth stub for logout route from layout
Route::post('/logout', function () {
    // Auth::logout();
    return redirect('/');
})->name('logout');
