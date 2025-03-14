<?php include 'app/views/shares/header.php'; ?>

<!-- Background Gradient -->
<section class="vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(to right, #6a11cb, #2575fc);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card text-white shadow-lg rounded-lg" style="background: #121212;">
                    <div class="card-body p-5 text-center">
                        <form action="/DemoBanHang/account/checklogin" method="post">
                            <h2 class="fw-bold mb-4 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-4">Please enter your login and password!</p>

                            <!-- Username Input -->
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control bg-dark text-white border-light" placeholder="Username" required>
                                <label class="text-white">Username</label>
                            </div>

                            <!-- Password Input -->
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control bg-dark text-white border-light" placeholder="Password" required>
                                <label class="text-white">Password</label>
                            </div>

                            <!-- Forgot Password -->
                            <div class="d-flex justify-content-between mb-4">
                                <a href="#!" class="text-white-50 small">Forgot password?</a>
                            </div>

                            <!-- Login Button -->
                            <button class="btn btn-primary btn-lg w-100 py-2" type="submit" style="background: #ff4081; border: none; transition: 0.3s;">
                                Login
                            </button>

                            <!-- Social Icons -->
                            <div class="d-flex justify-content-center mt-4">
                                <a href="#" class="text-white mx-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#" class="text-white mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="#" class="text-white mx-2"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                            <!-- Register Link -->
                            <p class="mt-4 mb-0">
                                Don't have an account?
                                <a href="/DemoBanHang/account/register" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
