<?php

use App\Http\Controllers\AdminPanelController;
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
    $new_models = Model3d::where('is_active', true)->orderBy('id', 'DESC')->take(4)->get();
    $lowest_prices = Model3d::where('is_active', true)->orderBy('price', 'ASC')->take(4)->get();
    $highest_prices = Model3d::where('is_active', true)->orderBy('price', 'DESC')->take(4)->get();

    return view('index', [
        'new_models' => $new_models,
        'lowest_prices' => $lowest_prices ,
        'highest_prices' => $highest_prices
    ]);
})->name('index');


//chat routes
Route::get('/chat', [UserProfileController::class, 'user_conversations_view'])->name('conversations')->middleware('auth', 'is_active');
Route::get('/chat/{id}', [UserProfileController::class, 'chat_view'])->middleware("auth", 'is_active');
Route::post('/chat/{id}', [UserProfileController::class, 'send_message'])->middleware('auth', 'is_active');


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
Route::post('/models/{slug}', [ModelController::class, 'add_comment_to_model'])->middleware('auth', 'is_active');
Route::get('/models/edit/{id}', [ModelController::class, 'edit_model_view'])->middleware('auth', 'is_active');
Route::put('/models/edit/{id}', [ModelController::class, 'edit_model'])->name('editModel')->middleware('auth', 'is_active');
Route::delete('/models/delete/{id}', [ModelController::class, 'delete_model'])->middleware('auth', 'is_active');
Route::get('/models/download/{slug}', [ModelController::class, 'download_model'])->middleware('auth', 'is_active');
Route::get('profile/upload', [ModelController::class, 'upload_model_view'])->middleware('auth', 'is_active')->name('newModel');
Route::post('profile/upload', [ModelController::class, 'upload_model_form'])->name('newModelForm');

//authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/not-active', function () {
    return view('not_active');
});


//forgot password
Route::get('/forgot-password', [UserProfileController::class, 'forgot_password_view'])->middleware('guest');
Route::post('/forgot-password', [UserProfileController::class, 'forgot_password_email'])->middleware('guest');
Route::get('/reset-password/{token}', [UserProfileController::class, 'reset_password_view'])->middleware('guest');
Route::post('/reset-password', [UserProfileController::class, 'reset_password_form'])->middleware('guest');


//profile Routing
Route::get('/profile', [UserProfileController::class, 'profile_view'])->name('profilePanel')->middleware('auth', 'is_active');
Route::get('profile/edit', [UserProfileController::class, 'profile_edit_view'])->middleware('auth', 'is_active');
Route::put('profile/edit', [UserProfileController::class, 'profile_update'])->middleware('auth', 'is_active');


//buy routes
Route::get('profile/cart', [BuyModelController::class, 'cart_view'])->name('userCart')->middleware('auth', 'is_active');
Route::post('profile/cart', [BuyModelController::class, 'buy_all_cart'])->name('buyCart')->middleware('auth', 'is_active');
Route::get('models/buy/add/{id}', [BuyModelController::class, 'add_to_cart'])->middleware('auth', 'is_active');
Route::delete('models/buy/delete/{id}', [BuyModelController::class, 'delete_from_cart'], 'is_active');
Route::get('coin/buy', [BuyModelController::class, 'buy_coin_view'])->name('buyCoin')->middleware('auth', 'is_active');
Route::put('coin/buy', [BuyModelController::class, 'buy_coin'])->middleware('auth', 'is_active');

//admin routes
Route::get('/admin', [AdminPanelController::class, 'admin_view'])->middleware('auth', 'admin');
Route::get('/admin/users', [AdminPanelController::class, 'admin_users_view'])->middleware('auth', 'admin');
Route::get('/admin/user/{id}', [AdminPanelController::class, 'admin_user_edit_view'])->name('adminUserEdit')->middleware('auth', 'admin');
Route::put('/admin/user/{id}', [AdminPanelController::class, 'admin_user_edit'])->middleware('auth', 'admin');
Route::get('/admin/models', [AdminPanelController::class, 'admin_models_view'])->middleware('auth', 'admin');
Route::get('/admin/model/{id}', [AdminPanelController::class, 'admin_model_edit_view'])->middleware('auth', 'admin');
Route::put('/admin/model/{id}', [AdminPanelController::class, 'admin_model_edit'])->middleware('auth', 'admin');
Route::get('/admin/sales', [AdminPanelController::class, 'admin_sales_view'])->middleware('auth', 'admin');
Route::get('/admin/sale/{id}', [AdminPanelController::class,'admin_sale_edit_view'])->middleware('auth', 'admin');
Route::put('/admin/sale/{id}', [AdminPanelController::class,'admin_sale_edit'])->middleware('auth', 'admin');
Route::get('/admin/categories', [AdminPanelController::class, 'admin_categories_view'])->middleware('auth', 'admin');
Route::get('/admin/categories/{id}', [AdminPanelController::class, 'admin_categories_edit_view'])->middleware('auth', 'admin');
Route::put('/admin/categories/{id}', [AdminPanelController::class, 'admin_categories_edit'])->middleware('auth', 'admin');
Route::get('/admin/category/new', [AdminPanelController::class, 'admin_categories_new_view'])->middleware('auth', 'admin');
Route::post('/admin/category/new', [AdminPanelController::class, 'admin_categories_new'])->middleware('auth', 'admin');
