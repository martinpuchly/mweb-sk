<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JokeController;



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

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::name('admin.')->prefix('admin')->group(function () {
  
   
#PAGES
    Route::get('/stranky', [PageController::class, 'index'])->name('pages');
    Route::get('/stranky/nova', [PageController::class, 'create'])->name('page.add');
    Route::post('/stranky/nova', [PageController::class, 'store']);


    Route::get('/stranky/{page}/upravit', [PageController::class, 'edit'])->name('page.edit');
    Route::patch('/stranky/{page}/upravit', [PageController::class, 'update']);

    Route::post('/stranky/{page}/restore', [PageController::class, 'restore'])->name('page.restore');
    Route::delete('/stranky/{page}/delete', [PageController::class, 'delete'])->name('page.delete');
    Route::delete('/stranky/{page}/destroy', [PageController::class, 'destroy'])->name('page.destroy');

#POSTS
    Route::get('/clanky', [PostController::class, 'adminIndex'])->name('posts');
    Route::get('/clanky/novy', [PostController::class, 'create'])->name('post.add');
    Route::post('/clanky/novy', [PostController::class, 'store']);


    Route::get('/clanky/{post}/upravit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/clanky/{post}/upravit', [PostController::class, 'update']);

    Route::post('/clanky/{post_id}/restore', [PostController::class, 'restore'])->name('post.restore');
    Route::delete('/clanky/{post}/delete', [PostController::class, 'delete'])->name('post.delete');
    Route::delete('/clanky/{post_id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

#CONTACTS
    Route::get('/kontakty/{q?}', [ContactController::class, 'index'])->name('contacts');
    Route::get('/kontakt/{contact}', [ContactController::class, 'show'])->name('contact.show');
    Route::patch('/kontakt/{contact}/saveStatus', [ContactController::class, 'saveStatus'])->name('contact.saveStatus');
    Route::delete('/kontakt/{contact}/vymazat', [ContactController::class, 'destroy'])->name('contact.delete');

#JOKES
    Route::get('/vtipy', [JokeController::class, 'adminIndex'])->name('jokes');
    Route::get('/vtip/novy', [JokeController::class, 'create'])->name('joke.add');
    Route::post('/vtip/novy', [JokeController::class, 'store']);
    Route::get('/vtip/{joke}/upravit', [JokeController::class, 'edit'])->name('joke.edit');
    Route::patch('/vtip/{joke}/upravit', [JokeController::class, 'update']);
    Route::delete('/vtip/{joke}/vymazat', [JokeController::class, 'delete'])->name('joke.delete');


});

    Route::get('/kontakt', [ContactController::class, 'create'])->name('contact.add');
    Route::post('/kontakt', [ContactController::class, 'store']);


Route::get('/clanky/{tag?}', [PostController::class, 'index'])->name('posts');
Route::get('/clanok/{post_slug}', [PostController::class, 'show'])->name('post');

#STRÁNKY !POSLEDNÝ ROUTE
Route::get('/{page_slug}', [PageController::class, 'show'])->name('page');

/*
Route::get('auth/{service}', [AuthController::class, 'redirectToProvider'])->name('auth.login');
Route::get('auth/{service}/callback', [AuthController::class, 'handleProviderCallback']);
*/