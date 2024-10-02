<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

}
