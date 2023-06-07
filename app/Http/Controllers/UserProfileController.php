<?php

namespace App\Http\Controllers;

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
                'email' => 'email|max:255|unique:users,email,'.$user->id
            ]);



            $user->update([
                'username' => $request['username'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number']
            ]);

            return back();
        }
        elseif ($request->has('password_change'))
        {
            dd('pass');
        }
        return view('profile');
    }
}
