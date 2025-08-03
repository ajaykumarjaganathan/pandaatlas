<!-- admin-dashboard.php -->
<?php
// Sample user data
$userName = "AJAYKUMAR";
$userEmail = "ajaykumarimpex833@gmaill.org";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Panda Atlas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background-color: #1c2434;
      color: white;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #adb5bd;
    }
    .sidebar .active {
      background-color: #2c3e50;
      padding-left: 10px;
    }
    .topbar {
      background-color: #1c2434;
      padding: 10px 20px;
      color: white;
    }
    .topbar .form-control {
      background-color: #2c3e50;
      border: none;
      color: white;
    }
    .topbar .form-control::placeholder {
      color: #ccc;
    }
  </style>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h5 class="mb-4">🏨 HOTEL <strong>PANDA</strong></h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a class="nav-link active" href="#"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link" href="#"><i class="bi bi-building me-2"></i>Hotel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-calendar-check me-2"></i>Bookings <span class="badge bg-primary ms-1">6</span></a>
      </li>
    </ul>
  </div>

  <!-- Content -->
  <div class="flex-grow-1">
    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center w-50">
        <input type="text" class="form-control me-2" placeholder="Search">
       
      </div>
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-outline-light btn-sm"><i class="bi bi-globe"></i> View website</button>
        <i class="bi bi-moon-fill text-white fs-5"></i>
        <i class="bi bi-bell-fill position-relative text-white fs-5">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">0</span>
        </i>
        <i class="bi bi-envelope-fill position-relative text-white fs-5">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">6</span>
        </i>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Profile" width="32" height="32" class="rounded-circle me-2">
            <strong><?= $userName ?></strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><?= $userEmail ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Page Content -->
    <div class="container-fluid mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
      </nav>

      <!-- Replace this with cards, table, etc. -->
      <h4>Welcome to Hotel Panda Admin Dashboard!</h4>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
