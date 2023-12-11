<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::get('/prima', function () {

    return 'test';
    // return view('welcome');
});

//varianta definire celor 7 rute dintr-o singura linie 

// folosin php artisan route:list pentru a vedea toate rutele 


Route::resource('users', UserController::class);

//lsitarea tuturor userilor
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');
//Listare tuturor Userilor 


// Ruta pentru stocarea informatilor din formular 
Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

//Afisarea datelor unui user specific dat prin url
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

//aplicatianoastra.com/users/1

//Afisarea formularului editare
Route::get('/users', [UserController::class, 'edit'])
    ->name('users.edit');

///Stocam datele din formularul de editare
Route::put('/users/{user}/edit', [UserController::class, 'update'])
    ->name('users.update');


//Stergerea unui record
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');



// Route::resource('orders', OrderController::class);
// Route::resource('products', ProductController::class);
// Route::resource('categories', CategoryController::class);
