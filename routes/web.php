<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;




Route::group(['prefix'=>'admin', 'namespace'=>'App\Http\Controllers\Admin', 'middleware'=>['auth']], function(){
Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
Route::resource('/category', CategoryController::class)->names('admin.category');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}', [CategoryController::class,'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');