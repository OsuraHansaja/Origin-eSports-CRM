<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class AdminDashboardController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        return view('admin.dashboard'); // You will need to create this view file later
    }

    // Display all orders for order management
    public function viewOrders()
    {
        $orders = Order::all(); // Retrieve all orders
        return view('admin.orders.index', compact('orders')); // Create this view file for listing orders
    }

    // Display specific order details
    public function viewOrderDetails($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = json_decode($order->items, true); // Decode the JSON stored in the 'items' column
        return view('admin.orders.details', compact('order', 'orderItems'));
    }

    // Display all products for admin shop management
    public function viewProducts()
    {
        $products = Product::all();
        return view('admin.shop.index', compact('products'));
    }

    // Show form for creating a new product
    public function createProduct()
    {
        return view('admin.shop.create');
    }

    // Store a new product
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        $imagePath = $request->file('image')->store('images', 'public');

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => '/storage/' . $imagePath,
        ]);

        return redirect()->route('admin.shop')->with('success', 'Product created successfully!');
    }

    // Show form for editing a product
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.shop.edit', compact('product'));
    }

    // Update an existing product
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload if a new one is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = '/storage/' . $imagePath;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('admin.shop')->with('success', 'Product updated successfully!');
    }

}
