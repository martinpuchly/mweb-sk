<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuickNewController;
use App\Http\Controllers\AdminController;


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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('admin')
        ->name('admin.')
        ->middleware('isAdmin')
        ->group(function () {
            Route::get('', [AdminController::class, 'index'])->name('admin');

        //STRANKY
            Route::get('/stranky', [PageController::class, 'adminList'])->name('pages');
            Route::get('/stranky/nova', [PageController::class, 'create'])->name('pages.create');
            Route::post('/stranky/nova', [PageController::class, 'store']);
            Route::get('/stranky/upravit/{page}', [PageController::class, 'edit'])->name('pages.update');
            Route::patch('/stranky/upravit/{page}', [PageController::class, 'update']);
            Route::patch('/stranky/obnovit/{page}', [PageController::class, 'restore'])->name('pages.restore');
            Route::delete('/stranky/vymazat/{page}', [PageController::class, 'delete'])->name('pages.delete');
            Route::delete('/stranky/vymazattrvale/{page}', [PageController::class, 'destroy'])->name('pages.destroy');


            Route::post('/stranky/uploadimage', [PageController::class, 'upload_images'])->name('pages.image-upload');

        //ČLÁNKY
            Route::get('/clanky', [PostController::class, 'adminList'])->name('posts');
            Route::get('/clanky/novy', [PostController::class, 'create'])->name('posts.create');
            Route::post('/clanky/novy', [PostController::class, 'store']);
            Route::get('/clanky/upravit/{post}', [PostController::class, 'edit'])->name('posts.update');
            Route::patch('/clanky/upravit/{post}', [PostController::class, 'update']);
            Route::patch('/clanky/obnovit/{post}', [PostController::class, 'restore'])->name('posts.restore');
            Route::delete('/clanky/vymazat/{post}', [PostController::class, 'delete'])->name('posts.delete');
            Route::delete('/clanky/vymazattrvale/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        //NOVINKY
            Route::get('/novinky', [QuickNewController::class, 'adminList'])->name('quicknews');
            Route::get('/novinky/nova', [QuickNewController::class, 'create'])->name('quicknews.create');
            Route::post('/novinky/nova', [QuickNewController::class, 'store']);
            Route::get('/novinky/upravit/{quicknew}', [QuickNewController::class, 'edit'])->name('quicknews.update');
            Route::patch('/novinky/upravit/{quicknew}', [QuickNewController::class, 'update']);
            Route::delete('/novinky/vymazat/{quicknew}', [QuickNewController::class, 'delete'])->name('quicknews.delete');


        });


        Route::get('/clanky/{tag?}', [PostController::class, 'index'])->name('posts');
        Route::get('/clanok/{post_slug}', [PostController::class, 'show'])->name('post');
        Route::put('/clanok/like/{post}', [PostController::class, 'like'])->name('post.like');
        Route::get('/{page_slug}', [PageController::class, 'show'])->name('page');
