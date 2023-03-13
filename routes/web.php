<?php

use App\Http\Controllers\DropzoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerauserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\MailSenderController;

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

// All listings
//Route::get('/', [ListingController::class, 'index']);

// Show create form (before the next one will make this effect)
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing
Route::post('/listings', [ListingController::class, 'store']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);



// ======================== Internal System ============================ //
// All Users
Route::get('/Users/index', [TerauserCOntroller::class, 'index']);

// All Users
Route::get('/', fn () => view('index'));

// Edit page for Each user
Route::get('/Users/{terauser}/edit', [TerauserController::class, 'edit']);

// Store a user
Route::post('/Users', [TerauserController::class, 'store']);

// Create a user
Route::get('Users/create', [TerauserController::class, 'create']);

// Update a user
Route::put('/Users/{terauser}', [TerauserController::class, 'update']);

// Update all password
Route::get('/Users/flushPassword', [TerauserController::class, 'flushPasswords']);

// ======================== Mail Sender ============================ //
Route::get('/Users/send', [MailSenderController::class, 'send_mail']);

// ======================== File Uploader ============================ //
Route::get('/Upload/index', [DropzoneController::class, 'index']);
Route::post('/Upload/store',[DropzoneController::class,'store'])->name('dropzone.store');




// Comomon name:
// index:   show all
// show:    show single
// create:  show form to create new listing
// store:   store new listing
// edit:    show form to edit listing
// update:  update listing
// destroy: delete listing

Route::get('/hello', function() {
    return response("<h1> hello world !!</h1>", 200)
        -> header('Content-Type', 'text/plain')
        -> header('foo', 'bar');
});

Route::get('/posts/{id}', function($id) {
    //ddd($id);
    return response('hello ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    //dd($request);
    return $request->name . ' ' . $request->city;
})

?>