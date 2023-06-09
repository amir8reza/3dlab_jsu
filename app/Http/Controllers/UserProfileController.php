<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Model3d;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function profile_view(){


        $user = User::findOrFail(Auth::id());
        $models = User::find(Auth::id())->model3ds;

        foreach ($models as $model)
        {
            $model['image'] = DB::table('images')->where('model_id', $model['id'])->get()->first();
        }


        return view('profile', [
            'user' => $user,
            'models' => $models,
        ]);

    }
    public function profile_edit_view()
    {
        return view('profile_edit');
    }
    public function profile_update(Request $request){

        if ($request->has('information_change'))
        {
            $user = User::findOrFail(Auth::id());

            $validated = $request->validate([
                'username' => 'max:255|string|unique:users,username,'.$user->id,
                'phone_number' => 'min:11|numeric|unique:users,phone_number,'.$user->id,
                'email' => 'email|max:255|unique:users,email,'.$user->id,
                'user-description' => 'string'
            ]);



            $user->update([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'],
                'user_description' => $validated['user-description']
            ]);

            return back();
        }
        elseif ($request->has('password_change'))
        {
            dd('pass');
        }
        return view('profile');
    }

    public function chat_view(Request $request){
        $from_user = Auth::user();
        $to_user = User::findOrFail($request['id']);

        $messages = db::table('chats')->where([
           'from' => $from_user['id'],
            'to' => $to_user['id']
        ])->orWhere([
            'from' => $to_user['id'],
            'to' => $from_user['id']
        ])->get();

        return view('chat', [
            'from_user' => $from_user,
            'to_user' => $to_user,
            'messages' => $messages
        ]);
    }
    public function send_message(Request $request)
    {
        $from_user = Auth::user();
        $to_user = User::findOrFail($request['id']);

        $validated = $request->validate([
            'new_text' => "required|string"
        ]);

        Chat::create([
            'from' => $from_user['id'],
            'to' => $to_user['id'],
            'text' => $validated['new_text']
        ]);

        return redirect('/chat/'.$to_user['id']);

    }

}
