<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// lesssons
// Route::get('/hello', function () {
//     return response("Hello world!", 401);
// });

// Route::get("/posts/{id}", function ($id) {

//     // dd($id); // for debugging. it also stops the server from doing anything else
//     // ddd($id); // for deeper debugging

//     return response("post-" . $id);
// })->where("id", "[0-9]+");

// Route::get("/search", function (Request $req) {
//     return response($req->name . "  " . $req->city);
// });

////////////////////////////////////////////////


// LARAGIGS PROJECT

//All Listings
Route::get('/', [ListingController::class, "index"]);

//Single Listing

Route::get("/listings/{id}", [ListingController::class, "show"])->where("id", "[0-9]+");

//Show create form
Route::get("/listings/create", [ListingController::class, "create"]);

//Store Listing Data
Route::post("/listings", [ListingController::class, "store"]);
