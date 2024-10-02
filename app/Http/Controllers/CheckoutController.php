<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

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
        ]);

        // Process the order (add logic for creating the order in the database, reducing inventory, etc.)

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
