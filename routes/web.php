<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SharedController;
use App\Http\Controllers\TableController;
use App\Models\User;

Route::get('/', function () {
    if (Auth::check()) return redirect('/home');
    else return view('auth.login');
});

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
    ]);

    auth()->login($user);

    return redirect('/dashboard');
 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::resources([
    'expenses' => ExpenseController::class,
    'tables' => TableController::class,
    'shared' => SharedController::class,
]);

Route::get('tables/{id}/pdf', [TableController::class, 'pdfData'])->name('tables.pdf');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');