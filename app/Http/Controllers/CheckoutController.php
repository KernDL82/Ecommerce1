<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Helpers\ShippingHelper;
use App\Models\points\PointsDiscount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $user = Auth::user();

        $cart_data = $user->products()->withPrices()->get();

        if ($cart_data->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Your Cart is empty.');
        }

        $cart_data->calculateSubtotal();
        // get shipping data
        $shipping_helper = new ShippingHelper($group_ids);
        $shipping_data = $shipping_helper->getGroupShippingOptions($group_ids);

        // Adressess
        // $address = $user->addresses()
        // ->where('adresses.type', '3')
        // ->where('addresses.is_default', 1)
        // ->first();

        $points_helper = new PointsHelper($cart_data->getSubtotal(), $user->total_points, $group_ids);
        $discount_data = PointsDiscount::all();

        return view('pages.default.checkoutpage',
            compact('cart_data', 'shipping_data', 'points_helper', 'discount_data')
            // compact('cart_data', 'shipping_data', 'address', 'points_helper', 'discount_data')
        );
    }

    public function points(Request $request)
    {
        $message = PointsHelper::exchangePoints($request->points_exchanged);

        return redirect()->route('checkout.index')->with('message', $message);
    }
}
