<?php

use App\DataTables\UsersDataTable;
use App\Helpers\ImageFilter;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;

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

Route::get('user/{id}/edit', function($id){
    return $id;
})->name('user.edit');

Route::get('/dashboard', function (UsersDataTable $dataTable) {
    return $dataTable->render('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('image', function(){
    $img = Image::make('que_cazamos.jpg');

        $img->filter(new ImageFilter(6));
   
    return $img->response();
});

Route::get('shop', function(){
    
});

Route::get('shop', [CartController::class, 'shop'])->name('shop');

Route::get('cart', [CartController::class, 'cart'])->name('cart');

require __DIR__.'/auth.php';
