<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// All Listings  
/*
Route::get('/', function () {
  
    return view('listings', [
        //'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
   
});
*/
Route::get('/',[ListingController::class, 'index']);

// show create form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings',[ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

// update listing - edit submit to update
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}',[ListingController::class, 'destory'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create User
Route::post('/users', [UserController::class, 'store']);

// Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate',[UserController::class,'authenticate']);


// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destory - delete listing

//Route::get('/listings/{id}', function($id) {
    /*
Route::get('/listings/{listing}', function(Listing $listing) {    
});
*/

    /*
    return view('listing', [
        'listing' => $listing
    ]);
    */

    //die, dump, debug
    //dd($id);
    //ddd($id);
    //return response('listings '.$id);
    
    /*
    $listing =Listing::find($id);
    
    if($listing) {
        return view('listing', [
            'listing' => Listing::find($id)
        ]);
    } else {
        abort('404');
    }
    */
    

/*
Route::get('/listings/{$id}', function($id) {
    dd($id);
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});
*/


/*

Route::get('/hello', function() {
//    return 'Hello World';
    //return response('<h1>Hello World</h1>',404);
    return response('<h1>Hello World</h1>',200)
        -> header('Content-Type','text/plain')
        -> header('foo', 'bar');
});

Route::get('/posts/{id}', function($id) {
    //die, dump, debug
    //dd($id);
    ddd($id);
    return response('Post '.$id);
})->where('id','[0-9]+');

Route::get('/search',function(Request $request) {
    //dd($request);
    //dd($request->name.' '.$request->city);
    return $request->name.' '.$request->city;
});
*/