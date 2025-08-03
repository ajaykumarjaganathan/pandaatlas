<?php
$userName = "AJAYKUMAR"; // Default username

// Load CSV file
$csvFile = fopen("bookingform.csv", "r");
$users = [];
$headers = fgetcsv($csvFile); // Read header row

while (($row = fgetcsv($csvFile)) !== FALSE) {
    $users[] = array_combine($headers, $row);
}
fclose($csvFile);

// Pagination logic
$perPage = 10;
$totalUsers = count($users);
$totalPages = ceil($totalUsers / $perPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($totalPages, $page)); // Ensure page is within range
$start = ($page - 1) * $perPage;
$paginatedUsers = array_slice($users, $start, $perPage);
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
    .sidebar { height: 100vh; background-color: #1c2434; color: white; }
    .sidebar a { color: white; text-decoration: none; }
    .sidebar a:hover { color: #adb5bd; }
    .sidebar .active { background-color: #2c3e50; padding-left: 10px; }
    .topbar { background-color: #1c2434; padding: 10px 20px; color: white; display: flex; justify-content: space-between; }
    .topbar .form-control { background-color: #2c3e50; border: none; color: white; }
    .topbar .form-control::placeholder { color: #ccc; }
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


  <!-- Main Content -->
  <div class="flex-grow-1">
    <!-- Topbar -->
    <div class="topbar">
      <input type="text" class="form-control w-25" placeholder="Search">
      <div class="d-flex align-items-center gap-3">
        <strong><?= htmlspecialchars($userName) ?></strong>
        <img src="https://randomuser.me/api/portraits/men/44.jpg" width="32" height="32" class="rounded-circle">
      </div>
    </div>

    <!-- User Details -->
    <div id="users" class="container mt-4">
      <h5>Booking Details</h5>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Check-in Date & Time</th>
            <th>Check-out Date & Time</th>
            <th>No. of Children</th>
            <th>No. of Adults</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($paginatedUsers as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['Full Name']) ?></td>
              <td><?= htmlspecialchars($user['Mobile']) ?></td>
              <td><?= htmlspecialchars($user['Email']) ?></td>
              <td><?= htmlspecialchars($user['Check-In Date']) ?> <?= htmlspecialchars($user['Check-In Time']) ?></td>
              <td><?= htmlspecialchars($user['Check-Out Date']) ?> <?= htmlspecialchars($user['Check-Out Time']) ?></td>
              <td><?= htmlspecialchars($user['Children']) ?></td>
              <td><?= htmlspecialchars($user['Adults']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Pagination Links -->
      <nav>
        <ul class="pagination justify-content-center">
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
              <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php endfor; ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
