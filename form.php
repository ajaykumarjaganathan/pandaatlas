<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PANDA ATLAS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #FFD700, #FFFACD, #FFA500);
      background-size: 200% 200%;
      animation: sparkle 6s ease-in-out infinite;
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }

    @keyframes sparkle {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .form-box {
      background-color: #333;
      color: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
      max-width: 900px;
      margin: 80px auto;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn-success {
      width: 200px;
      font-size: 1rem;
      font-weight: 500;
      border-radius: 8px;
    }

    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="container">
    <form action="booknow.php" method="POST" class="form-box">
      <h2 class="text-center mb-4">PANDA ATLAS - Hotel Booking</h2>

      <div class="row g-4">

        <!-- Name -->
        <div class="col-md-4">
          <label class="form-label" for="name">Full Name</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
        </div>

        <!-- Mobile -->
        <div class="col-md-4">
          <label class="form-label" for="mobile">Mobile/Phone <span style="color: red">*</span></label>
          <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Mobile number" required>
        </div>

        <!-- Email -->
        <div class="col-md-4">
          <label class="form-label" for="email">Email Id</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com">
        </div>

        <!-- Check-In Date -->
        <div class="col-md-4">
          <label class="form-label" for="checkin_date">Check-In Date</label>
          <input type="date" id="checkin_date" name="checkin_date" class="form-control" required>
        </div>

        <!-- Check-In Time -->
        <div class="col-md-4">
          <label class="form-label" for="checkin_time">Check-In Time</label>
          <input type="time" id="checkin_time" name="checkin_time" class="form-control" required>
        </div>

        <!-- Check-Out Date -->
        <div class="col-md-4">
          <label class="form-label" for="checkout_date">Check-Out Date</label>
          <input type="date" id="checkout_date" name="checkout_date" class="form-control" required>
        </div>

        <!-- Check-Out Time -->
        <div class="col-md-4">
          <label class="form-label" for="checkout_time">Check-Out Time</label>
          <input type="time" id="checkout_time" name="checkout_time" class="form-control" required>
        </div>

        <!-- Adults -->
        <div class="col-md-4">
          <label class="form-label" for="adults">No. of Adults</label>
          <input type="number" id="adults" name="adults" class="form-control" placeholder="e.g. 2" min="1" required>
        </div>

        <!-- Children -->
        <div class="col-md-4">
          <label class="form-label" for="children">No. of Children</label>
          <input type="number" id="children" name="children" class="form-control" placeholder="e.g. 1" min="0" required>
        </div>

      </div>

      <!-- Submit Button -->
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-success">Book now</button>
      </div>
    </form>
  </div>

</body>
</html>
