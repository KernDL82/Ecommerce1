<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\products\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // auth, authenticates|logs in user, getGroups to see which groups a user is in
        $values = $request->query();

        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // shows products in product table
        $product_data = Product::withPrices()->get();
        $product_data = ProductFilter::withPrices()->filter($values)->get();

        // loads back product page ('view' is resposible for showing page)

        return view('pages.default.productspage', compact('product_data'));
    }
}
