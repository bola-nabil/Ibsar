<?php
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\AutherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('policy', function() {
        return view('policy');
    })->name('policy');

Route::middleware('adminauth')->group(function () {
    //change password
    Route::get('change-password',[dashboardController::class,'change_password_view'])->name('change_password_view');
    Route::post('change-password',[dashboardController::class,'change_password'])->name('change_password');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    Route::get('departments', function() {
        return view('department');
    })->name('department');

    
    // author CRUD
    Route::get('/authors', [AutherController::class, 'index'])->name('authors');
    Route::get('/authors/create', [AutherController::class, 'create'])->name('authors.create');
    Route::get('/authors/edit/{auther}', [AutherController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AutherController::class, 'update'])->name('authors.update');
    Route::delete('/authors/delete/{id}', [AutherController::class, 'destroy'])->name('authors.destroy');
    Route::post('/authors/create', [AutherController::class, 'store'])->name('authors.store');

    // publisher crud
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::get('/publisher/edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::post('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::delete('/publisher/delete/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
    Route::post('/publisher/create', [PublisherController::class, 'store'])->name('publisher.store');

    // Category CRUD
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/category/edit/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Image CRUD
    Route::get('/images', [ImageController::class, 'index'])->name('images');
    Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
    Route::post('image/store/', [ImageController::class, 'store'])->name('images.store');
    Route::get('image/show/{image}', [ImageController::class, 'show'])->name('images.show');
    Route::get('image/edit/{image}', [ImageController::class, 'edit'])->name('images.edit');
    Route::put('image/edit/{image}',[ImageController::class, 'update'])->name('images.update');
    Route::delete('image/{image}',[ImageController::class, 'destroy'])->name('images.destroy');

    // File CRUD
    Route::get('/files', [FileController::class, 'index'])->name('files');
    Route::get('/files/create', [FileController::class, 'create'])->name('files.create');
    Route::post('file/store/', [FileController::class, 'store'])->name('files.store');
    Route::get('file/show/{file}', [FileController::class, 'show'])->name('files.show');
    Route::get('file/edit/{file}', [FileController::class, 'edit'])->name('files.edit');
    Route::put('file/edit/{file}',[FileController::class, 'update'])->name('files.update');
    Route::delete('file/{file}',[FileController::class, 'destroy'])->name('files.destroy');

    // books CRUD
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::post('/book/create', [BookController::class, 'store'])->name('book.store');
    
    Route::get('/users', [AuthController::class, 'index'])->name('users');
    Route::get('/user/create', [AuthController::class, 'create'])->name('users.create');
    Route::post('/user/store', [AuthController::class, 'store'])->name('users.store');
    Route::get('user/edit/{user}', [AuthController::class, 'edit'])->name('users.edit');
    Route::put('user/edit/{user}',[AuthController::class, 'updateUser'])->name('user.update');
    Route::delete('user/{user}',[AuthController::class, 'remove'])->name('users.destroy');

});