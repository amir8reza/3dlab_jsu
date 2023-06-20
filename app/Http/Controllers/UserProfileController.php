<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Conversation;
use App\Models\Image;
use App\Models\Model3d;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class UserProfileController extends Controller
{
    public function profile_view(){


        $user = User::findOrFail(Auth::id());
        $models = User::find(Auth::id())->model3ds;
        $sales = Sale::with('model3ds')->where('user_id','=', Auth::id())->where('status','=', 'true')->get();

        return view('profile', [
            'user' => $user,
            'models' => $models,
            'sales' => $sales
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
            $user =Auth::user();
            $validated = $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed'
            ]);

            if (Hash::check($request['old_password'], $user->password))
            {
                $user->update([
                    'password' => $request['new_password']
                ]);
            }
        }
        return redirect('/profile/edit');
    }

    public function user_conversations_view()
    {
        $user = Auth::user();
        $user_conversations = Conversation::where('first_user', $user['id'])->orWhere('second_user', $user['id'])->get();

       foreach ($user_conversations as $user_conversation)
       {
           $to_id = $user_conversation['first_user'];
           if ($to_id == $user['id'])
               $to_id = $user_conversation['second_user'];

           $user_conversation['username'] = User::find($to_id)->username;
       }

        return view('conversations', [
            'user' => $user,
            'conversations' => $user_conversations,
        ]);
    }
    public function chat_view(Request $request){
        $from_user = Auth::user();
        $to_user = User::findOrFail($request['id']);

        if ($from_user['id'] == $to_user['id'])
        {
            return redirect(route('profilePanel'));
        }

        $messages = Chat::where('from', $from_user['id'])->where('to', $to_user['id'])->orWhere('from', $to_user['id'])->where('to', $from_user['id'])->get();

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


        if ($from_user['username'] > $to_user['username'])
        {
            $first_user = $to_user;
            $second_user = $from_user;
        }
        else {
            $first_user = $from_user;
            $second_user = $to_user;
        }

        $conversation = Conversation::firstOrCreate([
            'first_user' => $first_user['id'],
            'second_user' => $second_user['id']
        ]);

        Chat::create([
            'conversation' => $conversation['id'],
            'from' => $from_user['id'],
            'to' => $to_user['id'],
            'text' => $validated['new_text']
        ]);

        return redirect('/chat/'.$to_user['id']);

    }

}
