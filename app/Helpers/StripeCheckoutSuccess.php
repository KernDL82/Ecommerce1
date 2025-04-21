<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;

class StripeCheckoutSuccess
{
    protected $stripe;
    public $points_gained = 0;

    public function __construct()
    {
        $this->stripe = StripeClient::getClient();
    }

    /**
     * Undocumented function.
     *
     * @param [type] $session_id
     *
     * @return void
     */
    public function updateCheckoutOrder($session_id)
    {
        // find stripe check out id from database e.g. cs_test_b1tmYhMMLsoUP0QDEq7Rw2yxGNjxi3FSPrI4aexLsvLC4TaYTNAqw8xePd

        $order = Order::where('payment_id', $session_id)->first();
        if (!$order) {
            return false;
        }

        $stripe_helper = new StripeCheckout();
        // checks if there is an order on stripe
        $session = $stripe_helper->getCheckoutOrder($session_id);
        // extract info from stripe, if there is data to extract.
        $order_completed_data = $stripe_helper->getOrderCompletedData($session);

        $this->points_gained = $order->points_gained;

        if ($order && $order->payment_status == 'unpaid') {
            $user_id = $order->user_id;
            $user = User::where('id', $user_id)->first();

            // get shipping id
            $shipping_id = Shipping::where('stripe_id', $order_completed_data['stripe_id'])
            ->get()
            ->first()
            ->id;
            // update order in database
            $order->subtotal = $order_completed_data['subtotal'];
            $order->total = $order_completed_data['total'];
            $order->shipping_id = $shipping_id;

            // Finalise order
            $order->payment_status = 'paid';

            if (!$this->updatePoints($order, $user)) {
                return false;
            }

            $order->save();

            // User::find($user_id)->products()->detach();

            return true;
        }

        return true;
    }

    public function updatePoints(Order $order, User $user)
    {
        if ($order->points_exchanged > $user->total_points) {
            return false;
        }

        $this->points_gained = $order->points_gained;
        User::subtractPoints($user->id, $order->points_exchanged)->get();
        User::addPoints($user->id, $order->points_gained)->get();
        PointsHelper::clearPointsSession();

        return true;
    }
}
