<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\UserController;
use App\Mail\TESTMAIL;
use Illuminate\Support\Facades\Mail;




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

Route::get('coco', function () {
    return view('welcome');
});

Route::get('index', 'App\Http\Controllers\AnnonceController@index')->name("annonces.index");
Route::get('user', 'App\Http\Controllers\AnnonceController@user')->name("annonces.user");
Route::get('pub', 'App\Http\Controllers\AnnonceController@public')->name("annonces.public");
Route::get('form', 'App\Http\Controllers\AnnonceController@create')->name("annonces.create");
Route::group(['middleware' => 'visit'], function (){
Route::get('sho1', 'App\Http\Controllers\AnnonceController@sho1')->name("annonces.sho1");
});
Route::post('form', 'App\Http\Controllers\AnnonceController@store')->name("annonces.store");
Route::get('annonces/{code}', 'App\Http\Controllers\AnnonceController@show')->name("annonces.show");
Route::post('update/{code}', 'App\Http\Controllers\AnnonceController@update')->name('annonces.update');
Route::get('search', 'App\Http\Controllers\AnnonceController@search')->name('annonces.search');
Route::get('edit/{code}', 'App\Http\Controllers\AnnonceController@edit')->name("annonces.edit");
Route::GET('delete/{code}', 'App\Http\Controllers\AnnonceController@destroy')->name("annonces.destroy");

Route::group(['middleware' => 'admin'], function (){
    Route::get('qwerty', 'App\Http\Controllers\AnnonceController@qwerty')->name('annonces.qwerty');
});

Route::get('login', 'App\Http\Controllers\CustomAuthController@index')->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('registration');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('upload-image', [UploadImageController::class, 'index'])->name('upload.image');
Route::post('save', [UploadImageController::class,  'savePhoto'])->name('uploadPhoto');

Route::get('profile', [UserController::class, 'show'])->name('profile');
Route::get('edit', [UserController::class, 'edit'])->name('profile.edit');
Route::post('update', [UserController::class, 'update'])->name('profile.update');
Route::get('forg', [UserController::class, 'showChangePasswordForm'])->name('profile.forg');
Route::post('forget', [UserController::class, 'changePassword'])->name('profile.forget');
Route::get('users', [UserController::class, 'users'])->name('users');



// Show the forgot password form
Route::get('password/reset', [UserController::class, 'forgotPassword'])->name('password.request');

// Handle the forgot password form submission
Route::post('password/email', [UserController::class, 'sendResetLinkEmail'])->name('password.email');

// Show the password reset form
Route::get('password/reset/{token}', [UserController::class, 'resetPassword'])->name('password.reset');

// Handle the password reset form submission
Route::post('password/reset', [UserController::class, 'updatePassword'])->name('password.update');


Route::get('pdf/{code}', 'App\Http\Controllers\AnnonceController@generatePdf')->name('pdf');



Route::get('/RDV/{code}', 'App\Http\Controllers\AnnonceController@RDV')->name('annonces.RDV');
Route::post('/like/{code}', 'App\Http\Controllers\AnnonceController@like')->name('like');

Route::get('noti', 'App\Http\Controllers\AnnonceController@SHOWRDV')->name('annonces.noti');
Route::get('Accord/{index}', [AnnonceController::class, 'Accord'])->name('annonces.Accord');
Route::get('Refus/{index}', [AnnonceController::class, 'Refus'])->name('annonces.Refus');

Route::get('show/1','App\Http\Controllers\MachinelearningController@index');
Route::post('api/data','App\Http\Controllers\MachinelearningController@predict')->name('data');


Route::get("send",function(){
    Mail::to('elyassinisafouat2@gmail.com')->send(new TESTMAIL());
    return response('sending');
});

Route::get('comment', 'App\Http\Controllers\CommentController@index')->name("comment.index");
Route::get('create/{code}', 'App\Http\Controllers\CommentController@create')->name("comment.create");
Route::post('store', 'App\Http\Controllers\CommentController@store')->name("comment.store");
Route::GET('delet/{id}', 'App\Http\Controllers\CommentController@dest')->name("comment.dest");
Route::get('notif', 'App\Http\Controllers\CommentController@SHOWComments')->name('comment.noti');