<?php

use App\Http\Controllers\CitizenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Define a route to get the authenticated user
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Add a route for searching citizens by phone number
// Route::get('/citizens/search/{phone}', function ($phone) {
//     return $phone;
// });


// Define a route to store a new citizen
// Route::post('/citizens', [CitizenController::class, 'store']);



// Route::get('/citizens/search/{phone}', [CitizenController::class, 'searchByPhone']);
// Route::get('/citizens/search/{phone}', [CitizenController::class, 'searchByGhanaCard']);

Route::get('/citizens/search/{phone}', [CitizenController::class, 'searchByPhone'])
    ->where('phone', '[0-9]{10}');  // Assuming phone numbers are exactly 10 digits

Route::get('/citizens/search/{ghanaCardNumber}', [CitizenController::class, 'searchByGhanaCard'])
    ->where('ghanaCardNumber', 'GHA-[A-Z0-9]{9,}');  // Assuming Ghana card numbers follow this pattern

// Define a route to show a specific citizen by ID
// Route::get('/citizens/{id}', [CitizenController::class, 'show']);

// Define a route to list all citizens
Route::get('/citizens', [CitizenController::class, 'index']);



//https://randomuser.me/api/portraits/med/men/75.jpg