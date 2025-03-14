<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Bắt đầu thẻ Card -->
            <div class="card shadow">
                <!-- Tiêu đề Card -->
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="my-2">Đăng ký tài khoản</h4>
                </div>
                
                <!-- Nội dung Card -->
                <div class="card-body">
                    <?php
                    if (isset($errors) && count($errors) > 0) {
                        echo "<div class='alert alert-danger'>";
                        echo "<ul class='mb-0'>";
                        foreach ($errors as $err) {
                            echo "<li>$err</li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                    }
                    ?>

                    <!-- Form đăng ký -->
                    <form action="/DemoBanHang/account/save" method="post">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="username" 
                                name="username" 
                                placeholder="username"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="fullname" 
                                name="fullname" 
                                placeholder="fullname"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                placeholder="password"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="confirmpassword">Xác nhận mật khẩu</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="confirmpassword" 
                                name="confirmpassword" 
                                placeholder="confirmpassword"
                            >
                        </div>
                        
                        <button class="btn btn-primary btn-block mt-4">Đăng ký</button>
                    </form>
                    <!-- Kết thúc Form đăng ký -->
                </div>
                <!-- Kết thúc nội dung Card -->
            </div>
            <!-- Kết thúc thẻ Card -->
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
