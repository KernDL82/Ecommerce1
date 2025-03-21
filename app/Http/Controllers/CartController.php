<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display all products user added to cart.
     */
    // The index function will get or display all the products a user added to the cart
    // Auth is a block of code that checks for user's login
    public function index()
    {
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $user = Auth::user();
        // $user->products is a many to many relationship $user is assigned to user and products assigned to products

        $cart_data = $user->products()->withPrices()->get();

        $cart_data->calculateSubtotal();

        return view('pages.default.cartpage', compact('cart_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // this functions adds an item to cart from the details page only
    public function store(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity + '.$request->quantity), 'updated_at' => now()]
        );

        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::destroy($id);

        return redirect()->route('cart.index')->with('message', 'Product removed from cart');
    }

    // here adds item to cart from store page, however because of how the ui is setup only one item at a time can be added from the store page
    public function addToCartFromStore(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->id],
            ['quantity' => DB::raw('quantity + '. 1), 'updated_at' => now()]
        );

        // redirect user to the cart page
        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }
}
