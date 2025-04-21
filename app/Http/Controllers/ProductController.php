<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // auth, authenticates|logs in user, getGroups to see which groups a user is in

        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // shows products in product table
        $product_data = Product::withPrices()->get();

        // loads back product page ('view' is resposible for showing page)

        return view('pages.default.productspage', compact('product_data'));
    }
}
