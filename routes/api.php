<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\VoiceController;
use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\FileResource;
use App\Http\Resources\VoiceResource;
use App\Models\book;
use App\Models\category;
use App\Models\Image;
use App\Models\File;
use App\Models\Voice;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User_InformationController;
use App\Http\Controllers\CompleteController;


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
//users
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('userProfile', User_InformationController::class);
    Route::put('/userProfile/{id}',[User_InformationController::class, 'update']);
    Route::get('display/{id}', [User_InformationController::class, 'display']);
    Route::get('/user/{id}', [AuthController::class, 'show']);
    Route::put('/user/{id}',[AuthController::class, 'update']);
    Route::delete('/user/{id}', [AuthController::class, 'destroy']);

});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'registerUser']);

//books
Route::get('/books', function () {
    return BookResource::collection(book::all());
});
Route::get('/book/names', [BookController::class, 'findName']);
Route::get('/book/{name}', [BookController::class, 'searchName']);

// categories
Route::get('/categories', function () {
    return CategoryResource::collection(category::all());
});
Route::get('/category/names', [CategoryController::class, 'findName']);
Route::get('/category/{name}', [CategoryController::class, 'searchName']);

// images
Route::get('/images', function () {
    return ImageResource::collection(Image::all());
});
Route::get('/image/{name}', [ImageController::class, 'searchName']);

// files
Route::get('/files', function () {
    return FileResource::collection(File::all());
});
Route::get('/file/{name}', [FileController::class, 'searchName']);

//voices
Route::get('/voices', function () {
    return VoiceResource::collection(Voice::all());
});
Route::get('/voice/{name}', [VoiceController::class, 'searchName']);