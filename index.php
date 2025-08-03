<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Panda Atlas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body, html { margin: 0; padding: 0; height: 100%; color: white; }
    .hero-section {
      background: url('IMAGE.jpg') no-repeat center center;
      background-size: cover;
      height: 100vh;
      position: relative;
    }
    .custom-navbar {
      background-color: transparent;
      padding-top: 2px; padding-bottom: 2px;
      position: absolute; width: 100%; top: 0; z-index: 10;
    }
    .navbar-nav .nav-link {
      color: white !important;
      margin-right: 10px;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .navbar-nav .nav-link:hover {
      color: #ffc107 !important;
    }
    .btn-outline-light {
      border-color: white; color: white;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .btn-outline-light:hover { background-color: white; color: black; }
    .award-badge { height: 80px; }
    @media (max-width: 992px) { .award-badge { display: none; } }
    .destination-card {
      border-radius: 15px; overflow: hidden;
      transition: transform 0.3s ease; cursor: pointer;
      text-decoration: none; color: white; position: relative;
    }
    .destination-card:hover {
      transform: scale(1.03);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }
    .destination-image {
      height: 250px; width: 100%; object-fit: cover;
      filter: brightness(0.7);
    }
    .destination-text {
      position: absolute; bottom: 20px; left: 20px;
    }
    .destination-sub { font-size: 0.9rem; opacity: 0.85; }
    .destination-name { font-size: 1.8rem; font-weight: bold; }
    .section-title {
      text-align: center; font-size: 2rem; font-weight: bold;
      margin-top: 40px; margin-bottom: 20px;
      color: #b32f2f; text-transform: uppercase;
    }
    /* Overlay Modal Styling */
    .overlay-bg {
      position: fixed; inset: 0;
      width: 100vw; height: 100vh;
      background: rgba(20, 20, 20, 0.7);
      z-index: 2000;
      display: flex; align-items: center; justify-content: center;
    }
    .overlay-bg.hidden { display: none; }
    .modal-content-box {
      background: #fffbeebf;
      border-radius: 16px;
      box-shadow: 0 0 30px #ffd44fc6;
      padding: 22px;
      min-width: 320px;
      max-width: 90vw;
      border: none;
      position: relative;
    }
    .close-modal {
      position: absolute; top: 10px; right: 10px;
      background: #fff7c9; border: none;
      width: 36px; height: 36px; font-size: 1.5rem;
      border-radius: 50%; cursor: pointer;
      display: flex; align-items: center; justify-content: center;
    }
    .close-modal:hover { background: #ffe39d; color: #db9600; }
    .login-btn-navbar {
      background: white; color: #ff9802 !important;
      padding: 6px 22px; border-radius: 22px;
      font-weight: 600; border: none;
      margin-left: 15px; min-width: 92px;
    }
    .social-icons-nav {
      display: flex; gap: 10px; margin-right: 12px;
    }
    .social-icons-nav a {
      color: white; font-size: 1.3rem;
      text-shadow: 1px 1px 6px #0006;
    }
    .social-icons-nav .bi-facebook { color: #3b5998; }
    .social-icons-nav .bi-whatsapp { color: #25d366; }
    .social-icons-nav .bi-youtube { color: #ff0000; }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo" style="width: 180px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item d-flex align-items-center ms-2">
          <span class="social-icons-nav">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
          </span>
          <button class="login-btn-navbar" id="loginTrigger" type="button">
            <i class="bi bi-person-circle me-1"></i> Login
          </button>
          <img src="award.png" alt="Award" class="award-badge ms-3">
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero-section"></div>

<!-- Underrated Destinations -->
<div class="container py-5 bg-light text-dark">
  <p class="section-title">Underrated Destinations</p>
  <div class="row g-4">
    <div class="col-md-4 col-lg-3">
      <a href="japan.html" class="destination-card d-block">
        <img src="jp-sun.jpg" class="destination-image">
        <div class="destination-text">
          <div class="destination-sub">Land of Rising Sun</div>
          <div class="destination-name">Japan</div>
        </div>
      </a>
    </div>
    <div class="col-md-4 col-lg-3">
      <a href="vietnam.html" class="destination-card d-block">
        <img src="vie.jpg" class="destination-image">
        <div class="destination-text">
          <div class="destination-sub">Land of Ascending Dragon</div>
          <div class="destination-name">Vietnam</div>
        </div>
      </a>
    </div>
    <div class="col-md-4 col-lg-3">
      <a href="Thailand.html" class="destination-card d-block">
        <img src="thai.jpg" class="destination-image">
        <div class="destination-text">
          <div class="destination-sub">Land of the Golden Naga</div>
          <div class="destination-name">Thailand</div>
        </div>
      </a>
    </div>
    <div class="col-md-4 col-lg-3">
      <a href="singapore.html" class="destination-card d-block">
        <img src="sing.webp" class="destination-image">
        <div class="destination-text">
          <div class="destination-sub">The Roar of the Rising Lion</div>
          <div class="destination-name">Singapore</div>
        </div>
      </a>
    </div>
  </div>
</div>

<!-- Login Modal (still part of structure, but will not appear on login button click) -->
<div class="overlay-bg hidden" id="loginOverlay">
  <div class="modal-content-box">
    <button class="close-modal" id="closeLoginModal">&times;</button>
    <div id="loginModalContent">
      <div class="spinner-border text-warning" role="status"></div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
document.getElementById('loginTrigger').onclick = function () {
  window.location.href = 'register.php'; // Change to your actual registration URL if needed
  return false;
};

document.getElementById('closeLoginModal').onclick = function () {
  document.getElementById('loginOverlay').classList.add('hidden');
};

document.getElementById('loginOverlay').onclick = function (e) {
  if (e.target === this) this.classList.add('hidden');
};

document.addEventListener('keydown', function (e) {
  if (e.key === "Escape") document.getElementById('loginOverlay').classList.add('hidden');
});
</script>
</body>
</html>
