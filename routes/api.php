<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/books', [BooksController::class , 'index']);
Route::post('/getBookByID',[BooksController::class , 'getBookByID'] );
Route::post('/getReturnedBookByID',[BooksController::class , 'getReturnedBookByID'] );
Route::post('/update_ratings',[BooksController::class , 'update_ratings'] );
Route::post('/edit_ratings',[BooksController::class , 'edit_ratings'] );
Route::post('/getUserRating',[BooksController::class , 'getUserRating'] );
Route::post('/getAllRatings',[BooksController::class , 'getAllRatings'] );
Route::post('/book_reviews',[BooksController::class , 'book_reviews'] );
Route::post('/insert_review',[BooksController::class , 'insert_review'] );
Route::post('/update_review',[BooksController::class , 'update_review'] );



Route::post('/get_highest_rating',[BooksController::class , 'get_highest_rating'] );



Route::post('/events', [EventsController::class , 'index']);
Route::post('/getEventByID', [EventsController::class , 'getEventByID']);


Route::post('/insert_user', [AccountController::class , 'store']);
Route::post('/getAccounts', [AccountController::class , 'index']);


Route::post('/reservations', [BooksController::class , 'book_reservations']);
Route::post('/insert_reservations', [BooksController::class , 'insert_reservations']);
Route::post('/get_user_reservation', [BooksController::class , 'get_user_reservation']);
Route::post('/update_user_reservation', [BooksController::class , 'update_user_reservation']);






// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
