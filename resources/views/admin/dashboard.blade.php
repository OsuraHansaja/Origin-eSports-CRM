@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold">Total Net Income</h2>
                <p class="text-2xl">$11,623.00</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold">This Month's Income</h2>
                <p class="text-2xl">$2,343.00</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold">Total Orders</h2>
                <p class="text-2xl">289</p>
            </div>
            <div class="bg-gray-800 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold">Top Product</h2>
                <p class="text-2xl">"Apex TShirt" - 97 sales</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Sales by Country Chart -->
            <div class="bg-gray-800 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold mb-4">Sales by Country</h2>
                <canvas id="salesByCountryChart" style="max-height: 400px;"></canvas>
            </div>

            <!-- Monthly Sales Line Chart -->
            <div class="bg-gray-800 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold mb-4">Monthly Sales</h2>
                <canvas id="monthlySalesChart" style="max-height: 400px;"></canvas>
            </div>
        </div>

        <!-- Make the Top Sold Products Chart take the full width -->
        <div class="bg-gray-800 p-4 rounded-lg shadow mb-8">
            <h2 class="text-lg font-bold mb-4">Top Sold Products</h2>
            <canvas id="topSoldProductsChart" style="max-height: 400px;"></canvas>
        </div>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dummy data for the charts
            var countryLabels = ['USA', 'Canada', 'UK', 'Germany', 'Australia', 'Japan', 'India', 'France', 'Brazil', 'China'];
            var countryData = [25000, 15000, 12000, 8000, 5000, 3000, 2000, 1500, 1000, 800];

            // Sales by Country Pie Chart
            var ctxCountry = document.getElementById('salesByCountryChart').getContext('2d');
            var salesByCountryChart = new Chart(ctxCountry, {
                type: 'pie',
                data: {
                    labels: countryLabels,
                    datasets: [{
                        label: 'Sales by Country',
                        data: countryData,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            // Dummy data for monthly sales
            var monthlyLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var monthlyData = [5000, 7000, 8000, 12000, 15000, 11000, 13000, 14000, 15000, 16000, 17000, 18000];

            // Monthly Sales Line Chart
            var ctxMonthly = document.getElementById('monthlySalesChart').getContext('2d');
            var monthlySalesChart = new Chart(ctxMonthly, {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Sales',
                        data: monthlyData,
                        borderColor: '#36A2EB',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            // Dummy data for top sold products
            var productLabels = ['Apex TShirt', 'Sentinels Jersey', 'Sentinels Scarf', 'Valorant TShirt', 'CS Jersey','CS TShirt', 'Valorant Jersey', 'Sentinels Bag', 'Sentinels Sticker', 'Sentinels DeskPad'];
            var productData = [97, 31, 12, 15, 43, 16, 27, 35, 2, 11];

            // Top Sold Products Bar Chart
            var ctxProducts = document.getElementById('topSoldProductsChart').getContext('2d');
            var topSoldProductsChart = new Chart(ctxProducts, {
                type: 'bar',
                data: {
                    labels: productLabels,
                    datasets: [{
                        label: 'Units Sold',
                        data: productData,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
