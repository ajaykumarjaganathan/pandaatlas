<?php
$userName = "AJAYKUMAR";
$userEmail = "ajaykumarimpex833@gmaill.org";
$todaysRevenue = "5,25,000";
$registeredCustomers = "143";
$newFeedbacks = "23";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Panda Atlas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  
  <style>
    body { background-color: #f8f9fa; }
    .sidebar { height: 100vh; background-color: #1c2434; color: white; width: 220px; }
    .sidebar a { color: white; text-decoration: none; }
    .sidebar a:hover { color: #adb5bd; }
    .sidebar .active { background-color: #2c3e50; padding-left: 10px; }
    .topbar { background-color: #1c2434; padding: 10px 20px; color: white; }
    .topbar .form-control { background-color: #2c3e50; border: none; color: white; }
    .topbar .form-control::placeholder { color: #ccc; }

    .card-title { font-size: 1.5rem; font-weight: bold; }
    .card-text { font-size: 1.8rem; }
    .big-value { font-size: 2.5rem; font-weight: bold; }
    .btn { font-size: 1rem; }

    .chart-container { height: 300px; width: 100%; }
    #hotelMap { height: 350px; width: 100%; border-radius: 7px; }
    .card-summary { display: flex; align-items: center; gap: 10px; }

    .card {
      min-height: calc(90% + 1cm);
    }
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
      <li class="nav-item mb-2"><a class="nav-link" href="booking.php">Booking Details</a></li>
      <li class="nav-item mb-2"><a class="nav-link" href="user-detail.php">User Details</a></li>
     
    </ul>
  </div>


  <!-- Content Area -->
  <div class="flex-grow-1">
    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center">
      <input type="text" class="form-control w-25" placeholder="Search">
      <div class="d-flex align-items-center gap-3">
        <strong><?= htmlspecialchars($userName) ?></strong>
        <img src="https://randomuser.me/api/portraits/men/44.jpg" width="32" height="32" class="rounded-circle">
      </div>
    </div>

    <!-- Main Container -->
    <div class="container mt-4">
      <!-- Summary Cards -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card text-center text-dark" style="background-color: #ffc107;">
            <div class="card-body">
              <h5 class="card-title mb-3">Today's Revenue</h5>
              <p class="card-text fw-bold big-value">
                <i class="bi bi-currency-rupee me-2"></i><?= htmlspecialchars($todaysRevenue) ?>
              </p>
              <a href="#" class="btn btn-light">View</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center text-dark" style="background-color: #ffc107;">
            <div class="card-body">
              <h5 class="card-title mb-3">Registered Customers</h5>
              <p class="card-text fw-bold big-value">
                <i class="bi bi-people-fill me-2"></i><?= htmlspecialchars($registeredCustomers) ?>
              </p>
              <a href="#" class="btn btn-light">View</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-center text-dark" style="background-color: #ffc107;">
            <div class="card-body">
              <h5 class="card-title mb-4">New Feedbacks</h5>
              <p class="card-text fw-bold big-value">
                <i class="bi bi-chat-dots-fill me-2 "></i><?= htmlspecialchars($newFeedbacks) ?>
              </p>
              <a href="#" class="btn btn-light">View</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Analytics and Map -->
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-header bg-white">
              <h6 class="mb-0">Booking Analytics (Today)</h6>
            </div>
            <div class="card-body">
              <div class="chart-container">
                <canvas id="bookingChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-header bg-white">
              <h6 class="mb-0">Hotel Locations</h6>
            </div>
            <div class="card-body">
              <div id="hotelMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end .container -->
  </div> <!-- end content area -->
</div> <!-- end d-flex -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const bookingCtx = document.getElementById('bookingChart').getContext('2d');
    new Chart(bookingCtx, {
      type: 'line',
      data: {
        labels: ['1h', '3h', '5h', '7h', '9h', '11h', '13h', '15h', '17h', '19h', '21h', '23h'],
        datasets: [{
          label: 'Bookings',
          data: [5, 8, 12, 15, 20, 25, 18, 22, 30, 25, 15, 8],
          borderColor: '#4e73df',
          backgroundColor: 'rgba(78, 115, 223, 0.1)',
          tension: 0.3,
          fill: true,
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: { beginAtZero: true, ticks: { stepSize: 5 } }
        },
        plugins: { legend: { display: false } }
      }
    });

    const hotelMap = L.map('hotelMap').setView([20.5937, 78.9629], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(hotelMap);

    const hotels = [
      { name: "Panda Delhi", lat: 28.6139, lng: 77.2090 },
      { name: "Panda Mumbai", lat: 19.0760, lng: 72.8777 },
      { name: "Panda Bangalore", lat: 12.9716, lng: 77.5946 },
      { name: "Panda Kolkata", lat: 22.5726, lng: 88.3639 },
      { name: "Panda Las Vegas", lat: 36.1699, lng: -115.1398 }, 
      { name: "Panda Singapore", lat: 1.3521, lng: 103.8198 }
    ];

    hotels.forEach(hotel => {
      L.marker([hotel.lat, hotel.lng])
        .addTo(hotelMap)
        .bindPopup(`<b>${hotel.name}</b>`);
    });
  });
</script>
</body>
</html>
