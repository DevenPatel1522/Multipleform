<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

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


// Route::get('/image', function () {
//     return view('image');
// })->name('image');






Route::get('profile',[FormController::class,'profilege'])->name('profile.get');

Route::get('profile/{id}',[FormController::class,'profileget'])->name('profile');

Route::post('profile-step1',[FormController::class,'profilepost'])->name('profile.post');

Route::get('image/{lastid}',[FormController::class,'imageget'])->name('image');

// Route::get('imageget/{id}',[FormController::class,'image'])->name('image.get');

Route::post('image-step2',[FormController::class,'imagepost'])->name('image.post');

Route::get('education/{user}',[FormController::class,'education'])->name('education');

Route::get('educationget/{id}',[FormController::class,'educationget'])->name('lastpage');

Route::post('education-step3',[FormController::class,'educationpost'])->name('education.post');

Route::get('last/{id}',[FormController::class,'last'])->name('last');

Route::get('list',[FormController::class,'list'])->name('list');

Route::get('edit/{id}',[FormController::class,'edit'])->name('edit.get');

Route::post('destory',[FormController::class,'destory'])->name('destory');

// Route::get('changeStatus', 'UserController@changeStatus');
Route::get('changeStatus',[FormController::class,'changeStatus'])->name('changeStatus');

Route::post('editage',[FormController::class,'editage'])->name('editage');


Route::post('checkstatus',[FormController::class,'checkstatus'])->name('checkstatus');

// Route::get('search', 'PostsController@search')->name('search');

Route::get('search',[FormController::class,'search'])->name('search');

Route::get('activeuser',[FormController::class,'activeuser'])->name('activeuser');

Route::post('allactive',[FormController::class,'allactive'])->name('allactive');

Route::post('allinactive',[FormController::class,'allinactive'])->name('allinactive');

// Route::post('image-cropper/upload','ImageCropperController@upload');

Route::post('userimage-cropper/upload',[FormController::class,'upload'])->name('userimage-cropper/upload');



Route::post('usersignupload',[FormController::class,'usersignupload'])->name('usersignupload');








