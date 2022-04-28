<?php

use Illuminate\Support\Facades\Route;

//crear roles de ususario: admin y cliente
//use Spatie\Permission\Models\Role;
//Role::create(['name'=>'admin']);
//Role::create(['name'=>'cliente']);

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/layout/{category}', [App\Http\Controllers\HomeController::class, 'postByCategory'])->name('layout.category');
Route::get('/post/{postId}', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', function(){
        return view('home');
    });

    Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
    Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');

    Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'index'])->name('admin.posts');
    Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostsController::class, 'store'])->name('admin.posts.store');
    Route::post('/admin/posts/{postId}/update', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{postId}/delete', [App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('admin.posts.delete');
});

Auth::routes();


