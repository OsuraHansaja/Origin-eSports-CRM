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
        // Calculate total net income (sum of all orders)
        $totalIncome = Order::sum('total_amount');

        // Calculate this month's income
        $currentMonthIncome = Order::whereMonth('created_at', now()->month)->sum('total_amount');

        // Total order count
        $totalOrders = Order::count();

        // Most sold item (rank by product name and count of appearance in orders)
        $products = Order::all()->pluck('items');
        $itemCounts = [];

        foreach ($products as $productJson) {
            $items = json_decode($productJson, true);
            foreach ($items as $item) {
                $productName = $item['product']['name'];
                if (isset($itemCounts[$productName])) {
                    $itemCounts[$productName] += $item['quantity'];
                } else {
                    $itemCounts[$productName] = $item['quantity'];
                }
            }
        }
        arsort($itemCounts);
        $mostSoldItems = array_slice($itemCounts, 0, 5);

        // Get the countries by sales (assuming 'country' is stored in the orders table)
        $countrySales = Order::select('country', \DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->get();

        return view('admin.dashboard', compact('totalIncome', 'currentMonthIncome', 'totalOrders', 'mostSoldItems', 'countrySales'));
    }


    // Display all orders for order management
    public function viewOrders()
    {
        $orders = Order::orderBy('id', 'desc')->get(); // Fetch orders in descending order
        return view('admin.orders.index', compact('orders'));
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

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.shop')->with('success', 'Product deleted successfully!');
    }


}
