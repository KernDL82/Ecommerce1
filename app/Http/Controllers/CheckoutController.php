<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $user = Auth::user();

        $cart_data = $user->products()->withPrices()->get();

        if ($cart_data->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Your Cart is empty.');
        }

        $cart_data->calculateSubtotal();

        return view('pages.default.checkoutpage', compact('cart_data'));
    }
}
