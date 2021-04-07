<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Jobs\OrderPlacedEmailJob;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51HWMYOEXdeCg3tjb9eMj5msqyWJ2l3tzALrcUmsbYUEIA4qc7MOin5jp6r9bYPjV5asCEvepmlSwakDc8STlII1n00WOLm72Ny');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.stripe', compact('intent'));
    }
    public function placeOrder(Request $request)
    {
        $orders = new Order();
        $orders->user_id = auth()->user()->id;
        $orders->address = auth()->user()->address;
        $orders->payment_mode_id = 1;
        $orders->order_status_id = 1;
        $orders->transcation_id = time();


        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $totalamount = 0;
        foreach ($carts as $cart) {
            $totalamount = $cart->quantity * $cart->product->price;
        }
        $totalamount = $totalamount + (isset(auth()->user()->level->amount) ? auth()->user()->level->amount: 0);
        $orders->price = $totalamount;
       if($orders->save()) {
          
       }

        foreach ($carts as $cart) {

            $orderDetail = new OrderDetail();
            $orderDetail->user_id = auth()->user()->id;
            $orderDetail->product_id = $cart->product_id;
            $orderDetail->order_id = $orders->id;
            $orderDetail->quantity = $cart->quantity;
            $orderDetail->price = $cart->quantity * $cart->product->price;
            $orderDetail->color_id = $cart->color_id;
            $orderDetail->size_id = $cart->size_id;
            $orderDetail->save();

            $product=Product::find($cart->product_id);
            $product->stocks=$product->stock - $cart->quantity;
            $product->save();

            $cart->delete();
        }
        OrderPlacedEmailJob::dispatch($orders);

        session()->flash('message','Order Placed Succesfully');

        return redirect(route('home'));
    }
    public function Paysuccess()
    {
        return view('accounts.Payment');
    }
    public function invoice()
    {
        return view('accounts.invoice');
    }


    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
