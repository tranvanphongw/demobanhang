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
     <!-- Hiển thị thông báo nếu có -->
     <?php if (isset($_SESSION['success_message'])): ?>
          <div class="alert alert-success" id="success-message">
              <?php 
              echo $_SESSION['success_message']; 
              unset($_SESSION['success_message']); // Xóa thông báo sau khi hiển thị
              ?>
          </div>
      <?php endif; ?>

      <!-- Nội dung trang -->
  </div>

  <!-- JavaScript Bootstrap 4.5.2 -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
      // Tự động tắt thông báo sau 3 giây
      $(document).ready(function() {
          setTimeout(function() {
              $("#success-message").alert('close');
          }, 2000);
      });y
  </script>
</body>
</html>