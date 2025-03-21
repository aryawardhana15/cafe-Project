<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>project cafe Navbar</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="bg-white shadow-md p-4 fixed w-full z-50 flex items-center justify-between">
    <!-- Brand Logo -->
    <a class="text-2xl font-bold text-gray-800 hover:text-orange-500 transition-colors" href="/home">Projectcafe</a>

    <!-- Sidebar Toggle Button -->
    <button class="text-gray-800 hover:text-orange-500 transition-colors md:hidden" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>

    <!-- User Info and Dropdown -->
    <div class="flex items-center space-x-4">
      <!-- User Name -->
      <div class="text-gray-800 font-medium hidden md:block">
        {{ auth()->user()->username }}
      </div>

      <!-- Profile Dropdown -->
      <div class="relative">
        <button class="focus:outline-none" id="profileDropdown">
          <img class="w-10 h-10 rounded-full border-2 border-orange-500 hover:border-gray-800 transition-colors" src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile">
        </button>

        <!-- Dropdown Menu -->
        <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden" id="dropdownMenu">
          <a href="/profile/my_profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">
            <i class="fas fa-user-alt mr-2"></i>My Profile
          </a>
          <a href="/profile/change_password" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">
            <i class="fas fa-key mr-2"></i>Change Password
          </a>
          <div class="border-t border-gray-200"></div>
          <form action="/auth/logout" method="post" id="form_auth_logout">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">
              <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <!-- JavaScript untuk Dropdown dan Sidebar Toggle -->
  <script>
    // Toggle Dropdown Menu
    document.getElementById('profileDropdown').addEventListener('click', function() {
      const dropdownMenu = document.getElementById('dropdownMenu');
      dropdownMenu.classList.toggle('hidden');
    });

    // Toggle Sidebar
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('hidden');
    });
  </script>
</body>
</html>