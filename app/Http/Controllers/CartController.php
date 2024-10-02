<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {
        // Find the product
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Create a new cart entry
        Cart::create([
            'product_id' => $product->id,
            'size' => $request->size,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Display cart items
    public function index()
    {
        // Retrieve cart items with related products
        $cartItems = Cart::with('product')->get();

        // Calculate total
        $cartTotal = $cartItems->reduce(function ($total, $item) {
            return $total + ($item->product->price * $item->quantity);
        }, 0);

        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    // Remove an item from the cart
    public function remove($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    // Update quantity of cart items
    public function updateQuantity(Request $request, $id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }
}
