<?php
$userName = "AJAYKUMAR";
$todaysRevenue = "₹15,000";
$registeredCustomers = 320;
$newMessages = 12;

$hotelStatsMain = [
  ["label" => "Pending Check-in", "bg" => "warning", "icon" => "bi-door-open", "link" => "pending-checkin.php"],
  ["label" => "Pending Check-out", "bg" => "warning", "icon" => "bi-door-closed", "link" => "pending-checkout.php"],
  ["label" => "Cancelled Booking", "bg" => "secondary", "icon" => "bi-x-circle", "link" => "cancelled-booking.php"]
];

$hotelStatsSub = [
  ["label" => "Foods", "bg" => "info", "icon" => "bi-cup-hot-fill", "link" => "foods.php"],
  ["label" => "Services", "bg" => "info", "icon" => "bi-tools", "link" => "services.php"],
  ["label" => "Taxes / Coupons", "bg" => "dark", "icon" => "bi-percent", "link" => "taxes-coupons.php"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Panda Atlas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body { background-color: #f8f9fa; }
    .sidebar { height: 100vh; background-color: #1c2434; color: white; width: 220px; }
    .sidebar a { color: white; text-decoration: none; }
    .sidebar a:hover { color: #adb5bd; }
    .sidebar .active { background-color: transparent; padding-left: 10px; }
    .topbar { background-color: #1c2434; padding: 10px 20px; color: white; }
    .topbar .form-control { background-color: #2c3e50; border: none; color: white; }
    .topbar .form-control::placeholder { color: #ccc; }
    .square-card {
      height: 220px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .square-card .btn {
      margin-top: auto;
    }
    html { scroll-behavior: smooth; }
  </style>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h5 class="mb-4">🏨 HOTEL <strong>PANDA</strong></h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a class="nav-link active" href="admin.php">Dashboard</a></li>

      <li class="nav-item mb-2"><a class="nav-link" href="hotel.php">Hotel</a></li>
      <li class="nav-item mb-2"><a class="nav-link" href="booking.php">Booking</a></li>
      <li class="nav-item mb-2"><a class="nav-link" href="user-detail.php">User Details</a></li>
    <!--<li class="nav-item mb-1"><a class="nav-link" href="user-enquiry.php">User Enquiry</a></li> 
    -->
    </ul>
  </div>

  <!-- Main Content Area -->
  <div class="flex-grow-1">
    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center">
      <input type="text" class="form-control w-25" placeholder="Search">
      <div class="d-flex align-items-center gap-2">
        <strong class="me-2"><?= htmlspecialchars($userName) ?></strong>
        <img src="https://randomuser.me/api/portraits/men/44.jpg" width="32" height="32" class="rounded-circle">
      </div>
    </div>

    <!-- Hotel Section -->
    <div class="container mt-4">
      <h5 class="mb-3">Hotel</h5>
      <div class="row">
        <?php foreach ($hotelStatsMain as $item): ?>
          <div class="col-md-4 mb-4">
            <div class="card text-bg-<?= $item['bg'] ?> square-card text-center">
              <div class="card-body d-flex flex-column">
                <i class="bi <?= $item['icon'] ?> fs-2 mb-2"></i>
                <div class="fs-5 mb-3"><?= htmlspecialchars($item['label']) ?></div>
                <a href="<?= $item['link'] ?>" class="btn btn-light btn-sm">View</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row">
          
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
