<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::resource('clients', ClientController::class);
    Route::resource('matters', MatterController::class);
    Route::resource('tasks', TaskController::class)->except(['show']);
    Route::resource('time-entries', TimeEntryController::class)->except(['show']);
    Route::resource('invoices', InvoiceController::class);

    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
});

require __DIR__.'/auth.php';
