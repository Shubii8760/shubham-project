<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use App\Models\Note;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Notes Routes
Route::group(['prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('/', [NotesController::class, 'index'])->name('index');
    Route::post('/', [NotesController::class, 'store'])->name('store');
});


// Notes View and Delete Route
Route::group(['prefix' => 'people', 'as' => 'people.'], function () {
    Route::get('/view', [NotesController::class, 'view'])->name('view');
    // /people/view
    Route::get('delete/{id}', [NotesController::class, 'delete'])->name('delete');
});


//Rich text Editor file handling//
Route::post('/upload', [NotesController::class, 'upload']);











// //To edit the notes//
// Route::get('/people/edit/{id}', [notesController::class, 'edit'])->name('people.edit');

// //To Update the notes//
// Route::get('/people/update/{id}', [notesController::class, 'update'])->name('people.update');


// to slug//
// Route::get('check_slug',[notesController::class,'getslug']);
