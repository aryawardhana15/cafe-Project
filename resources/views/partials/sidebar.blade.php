<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laracoffee Sidebar</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* Tambahkan transisi halus untuk sidebar */
    #sidebar {
      transition: transform 0.3s ease;
      z-index: 50; /* Pastikan sidebar di atas konten utama */
    }
    /* Geser seluruh halaman ke kanan saat sidebar terbuka */
    body.sidebar-open {
      margin-left: 16rem; /* Sesuaikan dengan lebar sidebar (w-64 = 16rem) */
    }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Toggle Button (Hanya untuk mobile) -->
  <button onclick="toggleSidebar()" class="m-4 p-2 bg-gray-800 text-white rounded md:hidden z-50 fixed">
    <i class="fas fa-bars"></i> Menu
  </button>

  <!-- Sidebar -->
  <nav id="sidebar"
    class="bg-white w-64 h-screen shadow-lg fixed top-0 left-0 z-40 transform -translate-x-full md:translate-x-0">
    
    <div class="p-4 space-y-2">
      @can("is_admin")
      <div class="text-sm font-bold text-gray-500 uppercase mb-4">Administrator</div>
      <a href="/home" class="sidebar-link flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100">
        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
      </a>
      <a href="/home/customers" class="sidebar-link flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100">
        <i class="fas fa-users mr-2"></i>Customers
      </a>
      <a href="/transaction" class="sidebar-link flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100">
        <i class="fas fa-dollar-sign mr-2"></i>Transaksi
      </a>
      @else
      <div class="text-sm font-bold text-gray-500 uppercase mb-4">Customer</div>
      <a href="/home" class="sidebar-link flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100">
        <i class="fas fa-home mr-2"></i>Home
      </a>
      <a href="/point/user_point" class="sidebar-link flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100">
        <i class="fas fa-paw mr-2"></i>My Point
      </a>
      @endcan

      <div class="text-sm font-bold text-gray-500 uppercase mt-6 mb-4">Interface</div>
      <a href="/product" class="sidebar-link flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100">
        <i class="fas fa-box mr-2"></i>Product
      </a>
      <div>
        <button class="sidebar-link w-full flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-100" onclick="toggleCollapse('orderCollapse')">
          <i class="fas fa-shopping-cart mr-2"></i>Order
          <i class="fas fa-angle-down ml-auto"></i>
        </button>
        <div id="orderCollapse" class="pl-4 hidden">
          <a href="/order/order_data" class="sidebar-link block p-2 text-gray-800 rounded-lg hover:bg-gray-100">Order Data</a>
          <a href="/order/order_history" class="sidebar-link block p-2 text-gray-800 rounded-lg hover:bg-gray-100">Order History</a>
        </div>
      </div>
    </div>

    <div class="p-4 border-t border-gray-200">
      <div class="text-sm text-gray-500">Currently logged in as:</div>
      <div class="font-bold text-gray-800">{{ auth()->user()->role->role_name }}</div>
    </div>
  </nav>

  <!-- Overlay for mobile -->
  <div id="sidebarOverlay"
    class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden"
    onclick="closeSidebar()">
  </div>

  <!-- Main Content -->
  <div id="main-content" class="p-6 relative z-0">
    <div class="container mx-auto">
      <h1 class="text-2xl font-bold">Welcome to Laracoffee</h1>
      <p class="mt-2 text-gray-600">Main content goes here...</p>
      <div class="mt-4">
        <h2 class="text-xl font-bold">Why Laracoffee?</h2>
        <p class="mt-2 text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde natus nesciunt exercitationem, libero odit quia consequuntur ullam nostrum ducimus, fugit aspernatur error, placeat voluptatibus incidunt modi eligendi culpa dolor nihil.</p>
        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione hic</p>
      </div>
      <div class="mt-4">
        <h2 class="text-xl font-bold">Easy way to order!</h2>
        <p class="mt-2 text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor suscipit odio, autem quos eos eveniet explicabo perferendis dolore quae cum molestiae itaque nostrum!</p>
        <ul class="mt-2 text-gray-600">
          <li>✓ Lorem ipsum dolor sit amet consectetur.</li>
          <li>✓ Lorem ipsum dolor sit.</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebarOverlay');
      const body = document.body;

      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
      body.classList.toggle('sidebar-open');
    }

    function closeSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebarOverlay');
      const body = document.body;

      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
      body.classList.remove('sidebar-open');
    }

    function toggleCollapse(id) {
      const el = document.getElementById(id);
      el.classList.toggle('hidden');
    }
  </script>
</body>
</html>