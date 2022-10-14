<?php

use App\Http\Controllers\AuthApis;
use App\Http\Middleware\LangCheck;
use App\Http\Middleware\ChickAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatsController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PayingsController;
use App\Http\Controllers\MycourseController;
use App\Http\Controllers\PlaylistsController;

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
//**************************************************************************************************** */

//*******************************>>>>>>auth<<<<<**********************************//
Route::post('/register', [AuthApis::class, 'register'])->middleware('AcceptKey');
Route::post('/send', [AuthApis::class, 'send'])->middleware('AcceptKey');
Route::post('/verify', [AuthApis::class, 'verify'])->middleware('AcceptKey');
Route::post('/login', [AuthApis::class, 'login'])->middleware('AcceptKey');

Route::post('/rest', [AuthApis::class, 'rest'])->middleware('AcceptKey');
Route::post('/Newpass', [AuthApis::class, 'Newpass'])->middleware('AcceptKey');

Route::get('/logoutAll', [AuthApis::class, 'logoutAll'])->middleware('AcceptKey');
Route::get('/logout', [AuthApis::class, 'logout'])->middleware('AcceptKey');
// 'LangCheck',StripeController php artisan make:controller StripeController -r


///courses user share not auth

Route::get('/showAllCourses', [MycourseController::class, 'showAllCourses'])->middleware('AcceptKey');//not done

Route::get('/showOneDetails/{id}', [MycourseController::class, 'showOneDetails'])->middleware('AcceptKey'); //not done
///courses comments share not auth

Route::post('/showComment', [CommentController::class, 'showComment'])->middleware('AcceptKey');

//**************************************************************************************************** */
Route::middleware(['ChickAdmin','AcceptKey','auth:sanctum','verified:sanctum'])->group(function () {
    ///courses
    Route::post('/storeCoursrs', [MycourseController::class, 'store']);
    Route::delete('/delete/{id}', [MycourseController::class, 'delete']);

    //playlist
    Route::post('/storePlaylist', [PlaylistsController::class, 'store']);
    Route::delete('/deletePlaylist/{id}', [PlaylistsController::class, 'delete']);
        });

//**************************************************************************************************** */



//*******************************>>>>>>user<<<<<**********************************//
Route::middleware(['AcceptKey','auth:sanctum','verified:sanctum'])->group(function () {
//Cart
Route::post('/store/{courseid}', [CatsController::class, 'store']);
Route::get('/showcart', [CatsController::class, 'showcart']);

Route::delete('/destroyItem/{itemid}', [CatsController::class, 'destroyItem']);

Route::delete('/destroyAll', [CatsController::class, 'destroyAll']);

//Payings

Route::post('/Payingsstore/{cartItemId}', [PayingsController::class, 'store']);

Route::post('/stripe-payment/{cartItemId}/{amount}', [StripeController::class, 'handlePost'])->name('stripe.payment');

///courses showPayingCourse user

Route::get('/showPayingCourse', [PayingsController::class, 'showPayingCourse']);

///PlaylistVideos user paying only

Route::get('/showPlaylistVideos/{courseId}', [PlaylistsController::class, 'showPlaylistVideos']);

Route::post('/ViewInc', [PlaylistsController::class, 'ViewInc']);
///Comment

Route::post('/storeComment', [CommentController::class, 'storeComment']);

});


