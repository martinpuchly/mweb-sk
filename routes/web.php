<?php

use App\Http\Controllers\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('admin')
        ->name('admin.')
        ->middleware('isAdmin')
        ->group(function () {
            Route::get('/stranky', [PageController::class, 'adminList'])->name('pages');
            Route::get('/stranky/nova', [PageController::class, 'create'])->name('pages.create');
            Route::post('/stranky/nova', [PageController::class, 'store']);
            Route::get('/stranky/upravit/{page}', [PageController::class, 'edit'])->name('pages.update');
            Route::patch('/stranky/upravit/{page}', [PageController::class, 'update']);
            Route::patch('/stranky/obnovit/{page}', [PageController::class, 'restore'])->name('pages.restore');
            Route::delete('/stranky/vymazat/{page}', [PageController::class, 'delete'])->name('pages.delete');
            Route::delete('/stranky/vymazattrvale/{page}', [PageController::class, 'destroy'])->name('pages.destroy');


            Route::get('/clanky', [PostController::class, 'adminList'])->name('posts');
            Route::get('/clanky/novy', [PostController::class, 'create'])->name('posts.create');
            Route::post('/clanky/novy', [PostController::class, 'store']);
            Route::get('/clanky/upravit/{page}', [PostController::class, 'edit'])->name('posts.update');
            Route::patch('/clanky/upravit/{page}', [PostController::class, 'update']);
            Route::patch('/clanky/obnovit/{page}', [PostController::class, 'restore'])->name('posts.restore');
            Route::delete('/clanky/vymazat/{page}', [PostController::class, 'delete'])->name('posts.delete');
            Route::delete('/clanky/vymazattrvale/{page}', [PostController::class, 'destroy'])->name('posts.destroy');

        });


        Route::get('/{page_slug}', [PageController::class, 'show'])->name('page');
