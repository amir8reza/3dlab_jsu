<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Model3d;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function admin_view()
    {
        return view('admin.admin');
    }

    public function admin_users_view()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.admin_users', [
            'users' => $users
        ]);
    }

    public function admin_models_view()
    {
        $models = Model3d::all();

        return view('admin.admin_models', [
            'models' => $models
        ]);
    }

    public function admin_sales_view()
    {
        $sales = Sale::all();

        return view('admin.admin_sales', [
            'sales' => $sales
        ]);
    }

    public function admin_categories_view()
    {
        $categories = Category::all();

        return view('admin.admin_categories', [
            'categories' => $categories
        ]);
    }
}
