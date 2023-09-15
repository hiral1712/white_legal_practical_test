<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::post('/login', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@login',
    'middleware' => 'App\Http\Middleware\CheckStatus',
]);
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Roles
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');

    //Employee
    Route::get('/employees', [App\Http\Controllers\UserController::class, 'index'])->name('employees');
    Route::get('/createemployee', function () {
        return view('employees.create');
    })->name('createemployee');
    Route::post('/addemployee', [App\Http\Controllers\UserController::class, 'addEmployee'])->name('addemployee');
    Route::get('/editemployee/{user_id}', [App\Http\Controllers\UserController::class, 'editEmployee'])->name('editemployee');
    Route::post('/updateemployee', [App\Http\Controllers\UserController::class, 'updateEmployee'])->name('updateemployee');
    Route::get('/deleteemployee/{user_id}', [App\Http\Controllers\UserController::class, 'deleteEmployee'])->name('deleteemployee');

    //Clients
    Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
    Route::get('/createclient', function () {
        return view('clients.create');
    })->name('createclient');
    Route::post('/addclient', [App\Http\Controllers\ClientController::class, 'addClient'])->name('addclient');
    Route::get('/editclient/{user_id}', [App\Http\Controllers\ClientController::class, 'editClient'])->name('editclient');
    Route::post('/updateclient', [App\Http\Controllers\ClientController::class, 'updateClient'])->name('updateclient');
    Route::get('/deleteclient/{user_id}', [App\Http\Controllers\ClientController::class, 'deleteClient'])->name('deleteclient');
});