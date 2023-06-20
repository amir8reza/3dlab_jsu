<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Model3d;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModelController extends Controller
{
    public function model_detail_view($slug)
    {
        $model = Model3d::where('slug', $slug)->get()->first();
        $user = User::findOrFail($model->creator_id);
        $image = $model->images;
        $image_url = asset('storage/'.$image->image);
        $comments = Comment::where('model3d_id', $model->id)->get()->all();

        if(Auth::check()) {
            $owned = Auth::user()->sales()->where('model3d_id', '=', $model->id)->where('status', 'true')->get();
            if ($owned->count()>0)
            {
                $owned = true;
            }
            else
                $owned = false;
        }
        else
            $owned = false;



        return view('model_details', [
            'user' => $user,
            'model' => $model,
            'image_url' => $image_url,
            'comments' => $comments,
            'owned' => $owned
        ]);
    }

    public function upload_model_view()
    {
        $categories = Category::where('parent_id', '!=', null)->get();
        $user = User::findOrFail(Auth::id());
        return view('add_model',[
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function upload_model_form(Request $request)
    {
     $validated = $request->validate([
            'title' => 'required|unique:model3ds,title',
            'categories' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg|max:5820',
            'model_file' => 'required|max:20480',
            'description' => 'string|required',
            'price' => 'required|numeric|digits_between:0,100000',
        ]);

        $slug_field = Str::slug($request['title'], '-');
        $file_format = $request->file('model_file')->getClientOriginalExtension();
        $file_name = $slug_field.'.'.$file_format;
        $user_id = Auth::id();
        $image_name = $slug_field.'.'.$request->file('image')->getClientOriginalExtension();

        //where files will be stored
        $file_path = $request->file('model_file')->storeAs('models/'.$user_id,$file_name);
        $request->file('image')->storeAs('public/images/'.$user_id, $image_name);
        $image_path = '/images/'.$user_id.'/'.$image_name;



        $model =  Model3d::create([
            'slug' => $slug_field,
            'title' => $request['title'],
            'price' => $request['price'],
            'file_format' => $file_format,
            'file' => $file_path,
            'creator_id' => $user_id,
            'description' => $request['description'],
        ]);

        $model->categories()->attach($request['categories']);

        Image::create([
            'image' => $image_path,
            'model_id' => $model->id,
        ]);

       return redirect('profile');
    }

    public function add_comment_to_model(Request $request, $slug){
        $validated = $request->validate([
            'user-comment-text' => 'required|max:1000',
            'rate' => 'required|numeric|integer|min:0,max:5'
        ]);

        $model_id = DB::table('model3ds')->where('slug', $slug)->get()->first()->id;

        Comment::create([
            'user_id' => Auth::id(),
            'model3d_id' => $model_id,
            'comment_text' => $validated['user-comment-text'],
            'rate' => $validated['rate'],
            'is_active' => 0
        ]);

        return redirect()->back();
    }

    public function edit_model_view(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $model = Model3d::findOrFail($request['id']);
        if($model['creator_id'] != $user['id'])
        {
            return (404);
        }

        $categories = Category::where('parent_id', '!=', null)->get();

        return view('edit_model',[
            'user' => $user,
            'categories' => $categories,
            'model' => $model
        ]);
    }

    public function edit_model(Request $request)
    {
        $model = Model3d::findOrFail($request['id']);



        $validated = $request->validate([
            'title' => 'required|unique:model3ds,title,'.$model->id,
            'image' => 'mimes:jpeg,png,jpg,svg|max:5820',
            'model_file' => 'max:20480',
            'description' => 'string|required',
            'price' => 'required|numeric|digits_between:0,100000',
        ]);

        $slug_field = Str::slug($validated['title'], '-');

        $model->update([
            'title' => $validated['title'],
            'slug' => $slug_field,
            'description' => $validated['description'],
            'price' => $validated['price']
        ]);

        if($request->hasFile('model_file'))
        {
            $file_format = $request->file('model_file')->getClientOriginalExtension();
            $file_name = $slug_field.'.'.$file_format;
            $file_path = $request->file('model_file')->storeAs('models/'.$model['creator_id'],$file_name);

            $model->update([
                'file' => $file_path,
                'file_format' => $file_format
            ]);
        }

        if($request->hasFile('image'))
        {
            $image = Image::where('model_id', $model['id'])->get()->first();
            $image_name = $slug_field.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images/'.$model['creator_id'], $image_name);
            $image_path = '/images/'.$model['creator_id'].'/'.$image_name;
            Storage::delete($image['image']);

            $image->update([
                'image' => $image_path
            ]);
        }

        return redirect(route('profilePanel'));

    }

    public function delete_model(Request $request)
    {

       $model = Model3d::findOrFail($request['id']);
        $model->delete();
        return redirect(route('profilePanel'));

    }

    public function download_model(Request $request)
    {
        $model = Model3d::where('slug', $request['slug'])->get()->first();

        if ($model == null) {
            abort(404);
        }
        else {
            $owned = Auth::user()->sales()->where('model3d_id', '=', $model->id)->where('status', 'true')->get()->first();
            if ($owned == null)
                abort(404);
            else
                return Storage::download($model->file);
        }

    }

    public function categories_view()
    {
        return view('categories');
    }
    public function sub_category_view(Request $request)
    {
        if ($request['sub_id'])
        {
            $sub_category = Category::where('id', $request['sub_id'])->where('parent_id', '!=', null)->get()->first();
            return view('sub_categories', [
                'sub_category' => $sub_category,
            ]);
        }
        else {
            $main_category = Category::find($request['id']);
            return view('sub_categories', [
                'main_category' => $main_category,
            ]);
        }
    }

    public function search(Request $request)
    {
        $models = Model3d::where('title', 'like', '%'.$request['search_bar_text'].'%')->get();

        return view('categories', ['models' => $models]);
    }

}
