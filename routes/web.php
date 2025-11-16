<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
// use App\Http\Livewire\Student\AnswerPage;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

    Route::middleware(['role:admin,staff'])->group(function () {

        Volt::route('/criterias', 'criterias.index')->name('criterias.index');
        Route::resource('questions', QuestionController::class);
        Volt::route('/questions/create', 'questions.create')->name('questions.create');

        // Volt::route('/activities', 'activities.index')->name('activities.index');
        // Route::get('/activities', function () {
        //     return 'OK';
        // });
        Route::get('/activities', App\Livewire\Activities\Index::class)->name('activities.index');
        Route::get('/teams', App\Livewire\Teams\Index::class)->name('teams.index');
        Route::get('/layanans', App\Livewire\Layanans\Index::class)->name('layanans.index');


    });

    Route::middleware(['role:admin,siswa'])->group(function () {
        Volt::route('/exams', 'exams.index')->name('exams.index');
        // Route::get('/student/answer', AnswerPage::class)->name('student.answer');
        // Route::get('/exam', fn() => view('livewire.exam.index'))->name('exam.index');
    });

});

require __DIR__.'/auth.php';
