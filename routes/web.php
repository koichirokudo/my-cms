<?php

use App\Http\Actions\Blog\IndexBlogAction;
use App\Http\Actions\Blog\ShowBlogAction;
use App\Http\Actions\Blog\CreateBlogAction;
use App\Http\Actions\Blog\PreviewBlogAction;
use App\Http\Actions\Blog\StoreBlogAction;
use App\Http\Actions\Inquiry\StoreInquiryAction;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/blogs', IndexBlogAction::class)->name('blog.index');
Route::get('/blogs/{id}', ShowBlogAction::class)->whereNumber('id')->name('blog.show');

Route::middleware('auth')->group(function () {
    Route::get('/blogs/create', CreateBlogAction::class)->name('blog.create');
    Route::post('/blogs/preview', PreviewBlogAction::class)->name('blog.preview');
    Route::post('/blogs', StoreBlogAction::class)->name('blog.store');
});

Route::view('/contact', 'contact.form')->name('contact.form');
Route::post('/contact', StoreInquiryAction::class)->name('contact.store');
Route::view('/contact/thanks', 'contact.thanks')->name('contact.thanks');

require __DIR__.'/auth.php';
