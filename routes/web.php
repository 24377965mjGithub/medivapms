<?php

use App\Livewire\CreateProject;
use App\Livewire\Dashboard;
use App\Livewire\DeleteNote;
use App\Livewire\DeleteProject;
use App\Livewire\EditNote;
use App\Livewire\EditProject;
use App\Livewire\SetDeadline;
use App\Livewire\ViewProject;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/add-project', CreateProject::class)->name('add-project');
    Route::get('/view-project/{projectid}', ViewProject::class)->name('view-project');
    Route::get('/edit-note/{noteid}', EditNote::class)->name('edit-note');
    Route::get('/delete-note/{noteid}', DeleteNote::class)->name('delete-note');
    Route::get('/edit-project/{projectid}', EditProject::class)->name('edit-project');
    Route::get('/delete-project/{projectid}', DeleteProject::class)->name('delete-project');
    Route::get('/set-deadline/{projectid}', SetDeadline::class)->name('set-deadline');
});
