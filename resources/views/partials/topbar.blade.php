<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laracoffee Navbar</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Navbar styling */
    .sb-topnav {
      background: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.5rem 1rem;
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      color: #2c3e50 !important;
      transition: color 0.3s ease;
    }

    .navbar-brand:hover {
      color: #ff6f61 !important;
    }

    /* Sidebar Toggle Button */
    .btn-link {
      color: #2c3e50;
      transition: color 0.3s ease;
    }

    .btn-link:hover {
      color: #ff6f61;
    }

    /* User Name */
    .form-inline {
      font-size: 1rem;
      font-weight: 500;
      color: #2c3e50;
    }

    /* Profile Dropdown */
    .nav-item.dropdown .nav-link {
      padding: 0.5rem 1rem;
    }

    .img-profile {
      border: 2px solid #ff6f61;
      transition: border-color 0.3s ease;
    }

    .nav-item.dropdown:hover .img-profile {
      border-color: #2c3e50;
    }

    /* Dropdown Menu */
    .dropdown-menu {
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 0.5rem 0;
      margin-top: 10px;
    }

    .dropdown-item {
      padding: 0.75rem 1.5rem;
      color: #2c3e50;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .dropdown-item:hover {
      background: #f8f9fa;
      color: #ff6f61;
      padding-left: 1.75rem;
    }

    .dropdown-item i {
      width: 20px;
      text-align: center;
      margin-right: 10px;
    }

    .dropdown-divider {
      margin: 0.5rem 0;
      border-color: #e9ecef;
    }

    /* Logout Button */
    .auth_logout {
      background: none;
      border: none;
      width: 100%;
      text-align: left;
      padding: 0.75rem 1.5rem;
      color: #2c3e50;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .auth_logout:hover {
      color: #ff6f61;
      padding-left: 1.75rem;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand ps-3" href="/home">Laracoffee</a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-light btn-sm order-1 order-lg-0 me-3 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Nama User/Admin -->
    <div style="color: black;" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      {{ auth()->user()->username }}
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ms-auto ms-md-0 me-1 me-lg-2" style="margin-right: 0;">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img width="40px" height="40px" class="img-profile rounded-circle"
            src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li>
            <a class="dropdown-item" href="/profile/my_profile">
              <i class="fas fa-user-alt fa-sm fa-fw text-gray-400"></i>My Profile
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="/profile/change_password">
              <i class="fas fa-key fa-sm fa-fw text-gray-400"></i>Change Password
            </a>
          </li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li>
            <form action="/auth/logout" method="post" id="form_auth_logout">
              @csrf
              <button type="submit" class="dropdown-item auth_logout" style="cursor: pointer;">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
              </button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>