<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\tickets;

Route::get('/', function () {
    $allTickets = tickets::all();
    return view('welcome', ['tickets' => $allTickets]);

});

Route::get('/ViewTicket', function() {
    $allTickets = tickets::all();
    return view('ViewTicket', ['tickets' => $allTickets]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
