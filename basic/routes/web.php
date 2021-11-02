<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "This is Home Page";
});

Route::get('/about', function () {
    return view('about');
});

// Route::get('/about', function () {
//     return view('about');
// })->middleware('check');

Route::get('/contact', [ContactController::class, 'index']
);

// Route::get('/contact-moon', [ContactController::class, 'index']
// )->name('con');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    /** User */
    //$users = User::all();

    /** Queries Builder */
    $users = DB::table('users')->get();

    return view('dashboard', compact('users'));
})->name('dashboard');
