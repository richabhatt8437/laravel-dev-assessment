<?php

use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\ProfileController;
use App\Models\JobListing;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function (Request $request) {
    $query = JobListing::query();

    $search = $request->input('search', '');
    $location = $request->input('location', '');

    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    if (!empty($location)) {
        $query->where('location', 'like', '%' . $location . '%');
    }

    $jobs = $query->latest()->get()->map(function ($job) {
        return [
            'id' => $job->id,
            'title' => $job->title,
            'company_name' => $job->company_name,
            'location' => $job->location,
            'experience' => $job->experience,
            'salary_range' => $job->salary_range,
            'description' => $job->description,
            'tags' => explode(',',$job->tags) ?? [], // Convert JSON string to array
            'technologies' => json_decode($job->technologies, true) ?? [], // Convert JSON string to array
            'created_at' => $job->created_at->toIso8601String(),
        ];
    });

    return Inertia::render('Dashboard', [
        'jobs' => $jobs,
        'search' => $request->search ?? '',
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';