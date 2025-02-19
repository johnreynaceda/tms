<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
   switch (auth()->user()->user_type) {
    case 'admin':
        return redirect()->route('admin.dashboard');
    case 'dean':
        return redirect()->route('dean.dashboard');
    case 'program_chair':
        return redirect()->route('program_chair.dashboard');
    case 'teacher':
        return redirect()->route('teacher.dashboard');
    case 'student':
        return redirect()->route('student.dashboard');
       
    
    default:
        # code...
        break;
   }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('administrator')->middleware(['auth', 'verified', Admin::class])->group( function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/school-year', function () {
        return view('admin.school-year');
    })->name('admin.school-year');
    Route::get('/colleges', function () {
        return view('admin.colleges');
    })->name('admin.colleges');
    Route::get('/courses', function () {
        return view('admin.courses');
    })->name('admin.courses');
    Route::get('/teachers', function () {
        return view('admin.teachers');
    })->name('admin.teachers');
    Route::get('/deans', function () {
        return view('admin.deans');
    })->name('admin.deans');
    Route::get('/programchair', function () {
        return view('admin.programchair');
    })->name('admin.programchair');
    Route::get('/students', function () {
        return view('admin.students');
    })->name('admin.students');
});

Route::prefix('dean')->middleware(['auth', 'verified'])->group( function(){
    Route::get('/', action: function () {
        return view('dean.dashboard');
    })->name('dean.dashboard');
    Route::get('/program-chairs', action: function () {
        return view('dean.program-chair');
    })->name('dean.program-chair');
    Route::get('/program-chairs', action: function () {
        return view('dean.program-chair');
    })->name('dean.program-chair');
    Route::get('/students', function () {
        return view('dean.students');
    })->name('dean.students');
    Route::get('/repository', function () {
        return view('dean.repository');
    })->name('dean.repository');
    Route::get('/repository/{id}', action: function () {
        return view('dean.repository-view');
    })->name('dean.repository-view');
});

Route::prefix('program-chair')->middleware(['auth', 'verified'])->group( function(){
    Route::get('/', action: function () {
        return view('program_chair.dashboard');
    })->name('program_chair.dashboard');
    Route::get('/students', action: function () {
        return view('program_chair.students');
    })->name('program_chair.students');
    Route::get('/repository', action: function () {
        return view('program_chair.repository');
    })->name('program_chair.repository');
    Route::get('/repository/{id}', action: function () {
        return view('program_chair.repository-view');
    })->name('program_chair.repository-view');
});

Route::prefix('teacher')->middleware(['auth', 'verified'])->group( function(){
    Route::get('/', action: function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
    Route::get('/repository', action: function () {
        return view('teacher.repository');
    })->name('teacher.repository');
    Route::get('/repository/{id}', action: function () {
        return view('teacher.repository-view');
    })->name('teacher.repository-view');
    Route::get('/repository/{id}', action: function () {
        return view('teacher.repository-view');
    })->name('teacher.repository-view');
    Route::get('/schedule', action: function () {
        return view('teacher.schedule');
    })->name('teacher.schedule');
});

Route::prefix('student')->middleware(['auth', 'verified'])->group( function(){
    Route::get('/', action: function () {
        return view('student.dashboard');
    })->name('student.dashboard');
    Route::get('/my-repository', action: function () {
        return view('student.my-repository');
    })->name('student.my-repository');
    Route::get('/my-schedule', action: function () {
        return view('student.my-schedule');
    })->name('student.my-schedule');
}); 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
