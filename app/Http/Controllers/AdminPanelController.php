<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Model3d;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

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
    public function admin_user_edit_view(Request $request)
    {

        $user = User::where('id', $request['id'])->get()->first();

        return view('admin.admin_users_edit', [
            'user' => $user
        ]);
    }
    public function admin_user_edit(Request $request)
    {
        $user = User::where('id', $request['id'])->get()->first();

        if ($request->is_active == 'true')
            $active = true;
        else
            $active = false;

        $validated = $request->validate([
            'username' => 'max:255|string|unique:users,username,'.$user->id,
            'phone_number' => 'min:11|numeric|unique:users,phone_number,'.$user->id,
            'email' => 'email|max:255|unique:users,email,'.$user->id,
            'role' => 'string' ,
            'wallet' => 'required|numeric|min:100',
        ]);

        $user->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'user_description' => $request['user_description'],
            'role' => $validated['role'],
            'wallet' => $validated['wallet'],
            'is_active' => $active
        ]);

        return redirect('/admin/users');
    }
    public function admin_models_view()
    {
        $models = Model3d::all();

        return view('admin.admin_models', [
            'models' => $models
        ]);
    }
    public function admin_model_edit_view(Request $request){

        $model = Model3d::findOrFail($request->id);

        return view('admin.admin_model_edit', ['model' => $model]);
    }
    public function admin_model_edit(Request $request){

        $model = Model3d::where('id', $request['id'])->get()->first();

        if ($request->is_active == 'true')
            $active = true;
        else
            $active = false;


        $validated = $request->validate([
            'title' => 'required|unique:model3ds,title,'.$model->id,
            'description' => 'string|required',
            'price' => 'required|numeric|digits_between:0,100000',
        ]);

        $slug_field = Str::slug($validated['title'], '-');

        $model->update([
            'title' => $validated['title'],
            'slug' => $slug_field,
            'description' => $validated['description'],
            'price' => $validated['price'] ,
            'is_active' => $active
        ]);

        return redirect('/admin/models');
    }
    public function admin_sales_view()
    {
        $sales = Sale::all();

        return view('admin.admin_sales', [
            'sales' => $sales
        ]);
    }
    public function admin_sale_edit_view(Request $request){

        $sale = Sale::findOrFail($request->id);

        return view('admin.admin_sales_edit', ['sale' => $sale]);
    }
    public function admin_sale_edit(Request $request){

        $sale = Sale::where('id', $request['id'])->get()->first();

        $sale->update([
            'status' => $request['status']
        ]);

        return redirect('/admin/sales');
    }
    public function admin_categories_view()
    {
        $categories = Category::all();

        return view('admin.admin_categories', [
            'categories' => $categories
        ]);
    }
    public function admin_categories_edit_view(Request $request)
    {
        $category = Category::findOrFail($request->id);

        return view('admin.admin_category_edit', [
            'category' => $category
        ]);
    }
    public function admin_categories_edit(Request $request){

        $category = Category::where('id', $request['id'])->get()->first();

        $category->update([
            'title' => $request['title']
        ]);

        return redirect('/admin/categories');
    }
    public function admin_categories_new_view()
    {
        $categories = Category::all();
        return view('admin.admin_category_new',
            ['categories'=>$categories]);
    }
    public function admin_categories_new(Request $request)
    {

      Category::create([
          'title' => $request['title'] ,
          'parent_id' => $request->parent
      ]);

      return redirect('/admin/categories');
    }
}
