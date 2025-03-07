<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;



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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function(){
    return 'Hello Worlds';
});

Route::get('/world', function(){
    return 'World';
});

Route::get('/greeting', function(){
    return 'Selamat Datang';
});

Route::get('/NIM', function(){
    return '2341720094';
});

Route::get('/user/{name}', function($name){
    return 'Nama Saya '. $name;
});


Route::get('/posts/{post}/comments/{comment}', function
($postId, $commentId){
    return 'Pos ke-'. $postId." Komentar ke-: ".$commentId;
});

// Route::get('/articles/{id}', function
// ($articleId){
//     return 'Halaman Artikel dengan ID '. $articleId;
// });

Route::get('/articles/{id}', [PageController::class, 'showArticle']);

Route::get('/resources', [PageController::class, 'index']);
Route::get('/resources', [PageController::class, 'about']);

Route::get('/user/{name?}', function($name=null){
    return 'Nama Saya '. $name;
});


Route::get('/user/{name?}', function($name='John'){
    return 'Nama Saya '. $name;
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
Route::get('/user/profile', function() {
    //
})->name('profile');

// Route::get(
//     '/user/profile', 
//     [UserProfilController::class, 'show']
// )->name('profile'); 

// Generating URLs...
// $url = route('profile');
// return redirect()->route('profile');

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
// ROUTE GROUP DAN ROUTE PREFIXES
// Route::middleware(['first', 'second'])->group(function ()
// {  Route::get('/', function() {
//         // Uses first & second middleware...
//     }); 

// Route::get('/user/profile', function(){
//      // Uses first & second middleware...
//     }); 
// });

// Route:: domain('{account} .example.com') ->group (function ()
// {Route:: get ('user/{id}', function ($account, $id) { //
// });
// });

// Route::middleware('auth')->group (function () {
// // Route::get('/user', [UserController::class, 'index']);
// Route::get('/post', [PostController:: class, 'index']);
// Route::get('/event', [EventController::class,'index']);
// });

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
// ROUTE PREFIXES
// Route::prefix('admin')->group (function (){
//     // Route::get('/user',[UserController::class, 'index']);
//     Route::get('/post',[PostController::class, 'index']);
//     Route::get ('/event', [EventController::class,
//     'index' ]);
// });

// REDIRECT ROUTES
Route::view('/here', '/there');

// VIEW ROUTES
Route::redirect('/welcome', '/welcome');
Route::redirect('/welcome', '/welcome', ['name' => 'Taylor']);

//
Route::get('/hello', [WelcomeController::class, 'hello']);

//

Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/article/{articleId}', ArticleController::class);

// PhotoController
Route::resource('photos', PhotoController::class);

//
Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->only(['create', 'store', 'update', 'destroy']);