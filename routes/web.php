<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TeamMemberController;
// --- الصفحات العامة ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/projects/{project:slug}', [PageController::class, 'projectDetail'])->name('projects.show');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact.form');
Route::post('/contact-us', [PageController::class, 'storeContact'])->name('contact.store');

// --- لوحة التحكم ---
Route::get('/dashboard', function () {
    return redirect()->route('admin.projects.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // مجموعة روابط الإدارة
    Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('teammembers', TeamMemberController::class);
        Route::resource('projects', ProjectController::class);
        Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});

require __DIR__.'/auth.php';
