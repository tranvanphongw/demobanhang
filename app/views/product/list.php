<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <!-- Dùng Flexbox để canh hai bên -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Danh sách sản phẩm</h1>
        <a href="/DemoBanHang/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
    </div>

    <!-- row-cols-md-3: Tự động chia 3 cột khi màn hình >= md -->
    <!-- g-4: Thêm khoảng cách giữa các cột và hàng -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($products as $product): ?>
            <!-- Mỗi cột là 1 .col -->
            <div class="col">
                <!-- Sử dụng h-100 để card cao 100% cột, các card sẽ có chiều cao bằng nhau -->
                <div class="card h-100">
                    <?php if ($product->image): ?>
                        <img 
                            src="/DemoBanHang/<?php echo $product->image; ?>" 
                            alt="Product Image" 
                            class="card-img-top"
                            style="height: 150px; width: 100%; object-fit: contain;"
                        >
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="/DemoBanHang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <p class="card-text mt-auto">
                            <strong>Giá:</strong> 
                            <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                            <br>
                            <strong>Danh mục:</strong> 
                            <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                    <div class="card-footer text-end">
                        <a 
                            href="/DemoBanHang/Product/edit/<?php echo $product->id; ?>" 
                            class="btn btn-warning btn-sm"
                        >
                            Sửa
                        </a>
                        <a 
                            href="/DemoBanHang/Product/delete/<?php echo $product->id; ?>" 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
                        >
                            Xóa
                        </a>
                        <!-- Nút Thêm vào giỏ hàng -->
                        <a 
                            href="/DemoBanHang/Product/addToCart/<?php echo $product->id; ?>"
                            class="btn btn-primary btn-sm ms-2"
                        >
                            Thêm vào giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
