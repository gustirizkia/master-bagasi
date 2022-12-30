<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart(CartRequest $request)
    {
        // $cartCek = DB::table('carts')->where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->first();
        $cart = Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty
        ]);

        return response()->json([
            'success' => true,
            'data' => $cart
        ], 201);
    }

    public function myCart(){
        $cart = Cart::where('user_id', auth()->user()->id)
        ->groupBy('product_id')
        ->select('id', 'product_id', DB::raw("sum(qty) as total_qty"), 'created_at', 'updated_at')
        ->with('product')->orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $cart
        ]);
    }

}
