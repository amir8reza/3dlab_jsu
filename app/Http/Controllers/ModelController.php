<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Model3d;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModelController extends Controller
{
    public function model_detail_view($slug)
    {
        $model = DB::table('model3ds')->where('slug', $slug)->get()->first();
        $user = User::findOrFail($model->creator_id);
        $image = DB::table('images')->where('model_id', $model->id)->get()->first();
        $image_url = asset('storage/'.$image->image);

        $comments = DB::table('comments')->where('model3d_id', $model->id)->get()->all();

        foreach ($comments as $comment)
        {
            $comment->username = User::find($comment->user_id)['username'];
        }

        return view('model_details', [
            'user' => $user,
            'model' => $model,
            'image_url' => $image_url,
            'comments' => $comments
        ]);
    }

    public function upload_model_view()
    {
        $categories = Category::all();
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
}
