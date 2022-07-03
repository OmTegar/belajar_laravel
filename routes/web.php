<?php

use App\Models\User;
use app\models\model1;
// use app\models\model1;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\RegisterControler;
use App\Http\Controllers\DashboardPostController;

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
    return view('main', [
        "title" => "HOME",
        "name_category" => category::all(),
        navbarControler::class, 'pilihan'
    ]);



    // return view ('pasrtials.navbar', [
    //     "name_category"=> category::all(),
    // ]);
});
// route::get('/' , [navbarControler::class, 'pilihan']);


Route::get('/about', function () {
    return view('halaman1', [
        "title" => "ABOUT",
        "name" => "tegar dito priandika",
        "email" => "tegardito02@gmail.com"
    ]);
});

Route::get('/postingan', [PostControler::class, 'index']);
// halaman singgle post
route::get('/posts/{post:slug}', [PostControler::class, 'show']);


route::get('/categories/{category:slug}', function (category $category) {
    return view('category', [
        'title' => $category->name,
        'post' => $category->post->load(['category', 'user']),
        'category' => $category->name,
    ]);
});

route::get('/authors/{author:username}', function (User $author) {
    return view('postingan', [
        'title' => "user Post",
        'posts' => $author->post->load(['category', 'user']),

    ]);
});

Route::get('/login', [LoginControler::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginControler::class, 'authenticate']);
Route::post('/logout', [LoginControler::class, 'logout']);


Route::get('/register', [RegisterControler::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterControler::class, 'store']);

Route::get('//dasboards', function(){
    return view ('dasboards.index',[
        'title'=>'dasboards'
    ]);
})->middleware('auth');

route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');