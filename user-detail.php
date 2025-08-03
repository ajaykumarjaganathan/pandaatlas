<?php
$userName = "AJAYKUMAR";

// Load registered users from users.csv
$csvFile = fopen("users.csv", "r");
$users = [];
$headers = fgetcsv($csvFile); // First line as headers

while (($row = fgetcsv($csvFile)) !== FALSE) {
    if (count($row) === count($headers)) {
        $users[] = array_combine($headers, $row);
    }
}
fclose($csvFile);

// Pagination Setup
$perPage = 10;
$totalUsers = count($users);
$totalPages = ceil($totalUsers / $perPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($totalPages, $page));
$start = ($page - 1) * $perPage;
$paginatedUsers = array_slice($users, $start, $perPage);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Details - Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <li class="nav-item mb-2"><a class="nav-link" href="admin.php">Dashboard</a></li>
      <li class="nav-item mb-2"><a class="nav-link" href="hotel.php">Hotel</a></li>
      <li class="nav-item mb-2"><a class="nav-link" href="booking.php">Booking</a></li>
      <li class="nav-item mb-2"><a class="nav-link active" href="user-detail.php">User Details</a></li>

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

    <!-- User Details Table -->
    <div id="users" class="container mt-4">
      <h5>User Details</h5>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password (Hashed)</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($paginatedUsers as $user): ?>
            <tr>
              <td><?= htmlspecialchars($user['firstname'] ?? '') ?></td>
              <td><?= htmlspecialchars($user['lastname'] ?? '') ?></td>
              <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
              <td><?= htmlspecialchars($user['password'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Pagination -->
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
