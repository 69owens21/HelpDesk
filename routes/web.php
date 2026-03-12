<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\tickets;
use Illuminate\Support\Facades\Auth;

// ==========================================
// 1. PUBLIC / STUDENT VIEW
// ==========================================
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        // Students should probably only see their own tickets
        // Admins can see everything
        if (Auth::user()->role === 'admin') {
            $tickets = tickets::all();
        } else {
            $tickets = tickets::where('user_id', Auth::id())->get();
        }

        return view('welcome', ['tickets' => $tickets]);
    });



    // ==========================================
    // 2. ADMIN ONLY VIEW
    // ==========================================
    Route::get('/ViewTicket', function() {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized Access');
        }

        $allTickets = tickets::all();
        return view('ViewTicket', ['tickets' => $allTickets]);

    });

    Route::get('/ticket/{id}', function($id) {
        $ticket = App\Models\tickets::findOrFail($id);

        return view('ticket-detail', ['ticket' => $ticket]);
    });

});


// ==========================================
// 3. LARAVEL BREEZE & PROFILE ROUTES
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
