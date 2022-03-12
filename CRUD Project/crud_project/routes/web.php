<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CrudController::class, 'page1']);
Route::get('/view', [CrudController::class, 'page2']);


Route::post('add', [CrudController::class, 'add']);
Route::get('edit/{id}', [CrudController::class, 'edit']);
Route::post('edit/update', [CrudController::class, 'update']);
Route::get('delete/{id}', [CrudController::class, 'delete']);