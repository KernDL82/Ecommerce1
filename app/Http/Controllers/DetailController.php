<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id)
    {
        // checks for user login /getgroups check for user groups
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];
        // this will only show one product
        $data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.testing.detailspage', compact('data'));
    }
}
