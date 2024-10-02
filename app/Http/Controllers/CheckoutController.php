<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order; // Import the Order model

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get(); // Retrieve cart items with product details
        return view('checkout.checkout', compact('cartItems'));
    }

    public function process(Request $request)
    {
        // Validate checkout form data
        $request->validate([
            'address' => 'required|string|max:255',
            'payment' => 'required|string',
            'email' => 'required|email|max:255', // Validate the email
        ]);

        // Calculate the total amount
        $cartItems = Cart::with('product')->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Store the order in the orders table
        Order::create([
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'payment_method' => $request->input('payment'),
            'items' => $cartItems->toJson(), // Store cart items as JSON
            'total_amount' => $totalAmount,
        ]);

        // Clear the cart after successful checkout
        Cart::truncate();

        // Redirect to a thank-you page
        return redirect()->route('checkout.thankyou')->with('success', 'Order placed successfully!');
    }

    public function thankyou()
    {
        return view('checkout.thankyou');
    }
}
