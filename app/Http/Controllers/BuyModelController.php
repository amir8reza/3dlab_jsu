<?php

namespace App\Http\Controllers;

use App\Models\Model3d;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyModelController extends Controller
{
    public function cart_view(Request $request)
    {
        $sales = Sale::with('model3ds')->where('user_id','=', Auth::id())->where('status', 'false')->get();
        return view('buy_model', [
            'sales' => $sales
        ]);
    }

    public function delete_from_cart(Request $request)
    {
       $sale = Sale::find($request['id']);
       $sale->delete();
       return redirect(route('userCart'));
    }

    public function add_to_cart(Request $request)
    {
        $model = Model3d::findOrFail($request['id']);
        $sale = Sale::create([
            'user_id' => Auth::id(),
            'model3d_id' => $model['id'],
            'price' => $model['price'],
            'status' => 'false'
        ]);

        $sale->model3ds()->attach($model['id']);
    }

    public function buy_all_cart()
    {
        $user = Auth::user();
        $sales = Sale::where('user_id', Auth::id())->get();
        $full_price = 0;

        foreach ($sales as $sale)
        {
            $full_price += $sale->price;
        }

        $new_wallet = $user['wallet'] - $full_price;

        if ($new_wallet < 0 )
        {
            return redirect('buy_coin');
        }

        $user->update([
            'wallet' => $new_wallet
        ]);

        foreach ($sales as $sale)
        {
            $sale->update([
                'status' => 'true'
            ]);
        }

        return redirect(route('userCart'))
;
    }
}
