<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý sản phẩm</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Quản lý sản phẩm</a>
      <button 
          class="navbar-toggler" 
          type="button" 
          data-toggle="collapse" 
          data-target="#navbarNav"
          aria-controls="navbarNav" 
          aria-expanded="false" 
          aria-label="Toggle navigation"
      >
          <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Danh sách các liên kết (menu) -->
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="/DemoBanHang/Product/">Danh sách sản phẩm</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/DemoBanHang/Product/add">Thêm sản phẩm</a>
              </li>
              <li class="nav-item">
                  <?php
                  if (SessionHelper::isLoggedIn()) {
                      echo "<a class='nav-link'>" . $_SESSION['username'] . "</a>";
                  } else {
                      echo "<a class='nav-link' href='/DemoBanHang/account/login'>Login</a>";
                  }
                  ?>
              </li>
              <li class="nav-item">
                  <?php
                  if (SessionHelper::isLoggedIn()) {
                      echo "<a class='nav-link' href='/DemoBanHang/account/logout'>Logout</a>";
                  }
                  ?>
              </li>
          </ul>
      </div>
  </nav>

  <div class="container mt-4">
      <!-- Nội dung trang -->
  </div>

  <!-- JavaScript Bootstrap 4.5.2 -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
