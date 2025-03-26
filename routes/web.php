<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lmsController;
use App\Http\Controllers\queryController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\userController;
use App\Http\Middleware\authcheck;


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
Route::controller(userController::class)->group(function(){
    Route::get('/authors','showAuthor')->name('authors');
    Route::get('/available', 'availableBook')->name('availableBook');
    Route::get('/authorDetail/{id}', 'authorDetail');
    Route::get('/main/{SID?}','main')->name('main');
    Route::get('issued/{SID}', 'issuedBook')->name('issued');
    // Route::post('/login','login');
    Route::post('/adminLogin','login');
    
});

Route::view('/index','login/index');
Route::view('/adminLogin','login/adminLogin');
Route::view('/login','login/login');

// Route::view('/main','layouts/main')->name('main');
// Route::get('author', 'authors');

// Route::view('admin','admin/index');

// Route::middleware([authcheck::class])->group(function() {  //starting middleware for validating user


Route::view('addstudent','admin/addstudent');
Route::view('addbook','admin/addbook');
Route::view('addauthor','admin/addauthors');

// });


Route::controller(lmsController::class)->group(function(){

    Route::get('/admin' , 'admin');
    Route::post('/addstudent','student');
    Route::post('/addauthor','author');
    Route::post('/addbook','addBook');
    Route::post('/admin' , 'issuedBook');


});

Route::controller(queryController::class)->group(function(){
    Route::get('/showStudent','showStudent')->name('showStudent');
    Route::get('/showBook','showBook')->name('showBook');
    Route::get('/showAuthor','showAuthor')->name('showAuthor');
    Route::get('/showIssuedHistory','BookHistory')->name('history');
    Route::get('/dueBook','dueBook')->name('dueBook');

    //related to update

    Route::get('/returnBook/{SID}', 'returnBook')->name('returnBook');
    Route::post('/returnBook/{SID}', 'updateBook');

    Route::get('/updateStudent/{SID}', 'sendStudentDetail');
    Route::post('/updateStudent/{SID}', 'updateStudent');

    Route::get('/updateAuthor/{id}', 'sendAuthorDetail');
    Route::post('/updateAuthor/{id}', 'updateAuthor');

    // student details
    Route::get('/studentDetail/{SID}','studentDetail');
    
});

Route::controller(deleteController::class)->group(function(){
    Route::get('/deleteStudent/{SID}','deleteStudent');
    Route::get('/deleteAuthor/{id}','deleteAuthor');
});







Route::get('/', function () {
    return view('login/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
