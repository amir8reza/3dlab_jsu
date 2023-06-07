<?php

use App\Http\Controllers\ModelController;
use App\Models\Model3d;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserProfileController;
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

//main routes

Route::get('/index', function () {
    $new_models = DB::table('model3ds')->orderBy('id', 'desc')->take(4)->get();
    return view('index', [
        'new_models' => $new_models,
    ]);
});

Route::get('/models/{slug}', [ModelController::class, 'model_detail_view']);
Route::post('/models/{slug}', [ModelController::class, 'add_comment_to_model'])->middleware('auth');



//authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout']);

//profile Routing
Route::get('/profile', [UserProfileController::class, 'profile_view'])->middleware('auth');
Route::get('profile/edit', [UserProfileController::class, 'profile_edit_view'])->middleware('auth');
Route::put('profile/edit', [UserProfileController::class, 'profile_update'])->middleware('auth');

Route::get('profile/upload', [ModelController::class, 'upload_model_view'])->middleware('auth')->name('newModel');
Route::post('profile/upload', [ModelController::class, 'upload_model_form'])->name('newModelForm');
