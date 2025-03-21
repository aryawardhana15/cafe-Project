<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }} Page</title>
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Simple DataTables CSS -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Custom CSS -->
  @include('/partials/main_css')
  @stack('css-dependencies')
</head>

<body class="bg-gray-100">
  <!-- Loading Indicator -->
  <div id="loading" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="text-white text-2xl">Loading...</div>
  </div>

  <!-- Topbar -->
  @include('/partials/topbar')

  <!-- Main Layout -->
  <div class="flex">
    <!-- Sidebar -->
    <nav id="sidebar" class="bg-white w-64 h-screen shadow-lg fixed transform -translate-x-full md:translate-x-0 transition-transform duration-300">
      @include('/partials/sidebar')
    </nav>

    <!-- Content -->
    <div class="flex-1 ml-0 md:ml-64 p-4 mt-16">
      <!-- Dynamic Content -->
      @yield("content")

      <!-- Footer -->
      @include('/partials/footer')
    </div>
  </div>

  <!-- Modals -->
  @stack('modals-dependencies')

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="/js/datatables-simple.js"></script>
  <script src="/js/scripts.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom JavaScript -->
  <script>
    // Toggle Sidebar
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('-translate-x-full');
    });
  </script>
  @stack('scripts-dependencies')
</body>

</html>