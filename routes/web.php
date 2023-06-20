<?php

use App\Http\Controllers\BuyModelController;
use App\Http\Controllers\ModelController;
use App\Models\Model3d;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    $new_models = Model3d::latest()->take(4)->get();
    return view('index', [
        'new_models' => $new_models,
    ]);
})->name('index');

Route::get('/chat', [UserProfileController::class, 'user_conversations_view'])->name('conversations')->middleware('auth');
Route::get('/chat/{id}', [UserProfileController::class, 'chat_view'])->middleware("auth");
Route::post('/chat/{id}', [UserProfileController::class, 'send_message']);


//about and categories
Route::get('/about-us', function (){
    return view('about_us');
})->name('aboutUs');
Route::get('/categories', [ModelController::class, 'categories_view'])->name('categories');
Route::get('/categories/{id}', [ModelController::class, 'sub_category_view']);
Route::get('/categories/{id}/{sub_id}', [ModelController::class, 'sub_category_view']);
Route::post('/categories', [ModelController::class, 'search'])->name('searchModel');

//working with models
Route::get('/models/{slug}', [ModelController::class, 'model_detail_view']);
Route::post('/models/{slug}', [ModelController::class, 'add_comment_to_model'])->middleware('auth');
Route::get('/models/edit/{id}', [ModelController::class, 'edit_model_view'])->middleware('auth');
Route::put('/models/edit/{id}', [ModelController::class, 'edit_model'])->name('editModel')->middleware('auth');
Route::delete('/models/delete/{id}', [ModelController::class, 'delete_model'])->middleware('auth');
Route::get('/models/download/{slug}', [ModelController::class, 'download_model'])->middleware('auth');
Route::get('profile/upload', [ModelController::class, 'upload_model_view'])->middleware('auth')->name('newModel');
Route::post('profile/upload', [ModelController::class, 'upload_model_form'])->name('newModelForm');

//authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//profile Routing
Route::get('/profile', [UserProfileController::class, 'profile_view'])->name('profilePanel')->middleware('auth');
Route::get('profile/edit', [UserProfileController::class, 'profile_edit_view'])->middleware('auth');
Route::put('profile/edit', [UserProfileController::class, 'profile_update'])->middleware('auth');


//buy routes
Route::get('profile/cart', [BuyModelController::class, 'cart_view'])->name('userCart')->middleware('auth');
Route::post('profile/cart', [BuyModelController::class, 'buy_all_cart'])->name('buyCart')->middleware('auth');
Route::get('models/buy/add/{id}', [BuyModelController::class, 'add_to_cart'])->middleware('auth');
Route::delete('models/buy/delete/{id}', [BuyModelController::class, 'delete_from_cart']);
Route::get('coin/buy', [BuyModelController::class, 'buy_coin_view'])->name('buyCoin')->middleware('auth');
Route::put('coin/buy', [BuyModelController::class, 'buy_coin'])->middleware('auth');


