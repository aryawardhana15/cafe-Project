<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laracoffee Sidebar</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
  <!-- Sidebar -->
<!-- Sidebar -->
<nav id="sidebar" class="bg-white w-64 h-screen shadow-lg fixed transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">
  @include('/partials/sidebar')
</nav>

<!-- Overlay untuk Layar HP -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden" onclick="closeSidebar()"></div>
      <!-- Administrator Section -->
      @can("is_admin")
      <div class="text-sm font-bold text-gray-500 uppercase mb-4">Administrator</div>
      <a href="/home" class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
      </a>
      <a href="/home/customers" class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <i class="fas fa-users mr-2"></i>Customers
      </a>
      <a href="/transaction" class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <i class="fas fa-dollar-sign mr-2"></i>Transaksi
      </a>
      @else
      <!-- Customer Section -->
      <div class="text-sm font-bold text-gray-500 uppercase mb-4">Customer</div>
      <a href="/home" class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <i class="fas fa-home mr-2"></i>Home
      </a>
      <a href="/point/user_point" class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <i class="fas fa-paw mr-2"></i>My Point
      </a>
      @endcan

      <!-- Interface Section -->
      <div class="text-sm font-bold text-gray-500 uppercase mt-6 mb-4">Interface</div>
      <a href="/product" class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
        <i class="fas fa-box mr-2"></i>Product
      </a>
      <div>
        <button class="w-full flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors" onclick="toggleCollapse('orderCollapse')">
          <i class="fas fa-shopping-cart mr-2"></i>Order
          <i class="fas fa-angle-down ml-auto"></i>
        </button>
        <div id="orderCollapse" class="pl-4 hidden">
          <a href="/order/order_data" class="block p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">Order Data</a>
          <a href="/order/order_history" class="block p-2 text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">Order History</a>
        </div>
      </div>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-gray-200">
      <div class="text-sm text-gray-500">Currently logged in as:</div>
      <div class="font-bold text-gray-800">{{ auth()->user()->role->role_name }}</div>
    </div>
  </nav>

  <!-- JavaScript untuk Toggle Collapse -->
  <script>
    function toggleCollapse(id) {
      const collapseElement = document.getElementById(id);
      collapseElement.classList.toggle('hidden');
    }
  </script>
</body>
</html>