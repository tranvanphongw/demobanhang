<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Bắt đầu thẻ Card -->
            <div class="card shadow">
                <!-- Tiêu đề Card -->
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Sửa sản phẩm</h4>
                </div>

                <!-- Nội dung Card -->
                <div class="card-body">
                    <?php
                    // Kiểm tra an toàn đối với biến $product
                    if (!isset($product) || !is_object($product)) {
                        echo "<div class='alert alert-danger'><strong>Sản phẩm không tồn tại hoặc dữ liệu bị lỗi.</strong></div>";
                        include 'app/views/shares/footer.php';
                        exit;
                    }
                    ?>

                    <!-- Hiển thị lỗi (nếu có) -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Form Sửa sản phẩm -->
                    <form 
                        method="POST" 
                        action="/DemoBanHang/Product/update" 
                        enctype="multipart/form-data" 
                        onsubmit="return validateForm();"
                    >
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">Tên sản phẩm:</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form-control"
                                value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="font-weight-bold">Mô tả:</label>
                            <textarea 
                                id="description" 
                                name="description" 
                                class="form-control" 
                                rows="3" 
                                required
                            ><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price" class="font-weight-bold">Giá:</label>
                            <input 
                                type="number" 
                                id="price" 
                                name="price" 
                                class="form-control" 
                                step="0.01"
                                value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" 
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id" class="font-weight-bold">Danh mục:</label>
                            <select 
                                id="category_id" 
                                name="category_id" 
                                class="form-control" 
                                required
                            >
                                <?php foreach ($categories as $category): ?>
                                    <option 
                                        value="<?php echo $category->id; ?>" 
                                        <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>
                                    >
                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="font-weight-bold">Hình ảnh:</label>
                            <input 
                                type="file" 
                                id="image" 
                                name="image" 
                                class="form-control"
                            >
                            <!-- Giữ lại đường dẫn ảnh cũ (nếu có) -->
                            <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">

                            <?php if ($product->image): ?>
                                <img 
                                    src="/<?php echo $product->image; ?>" 
                                    alt="Product Image" 
                                    class="img-fluid mt-3" 
                                    style="max-width: 100%; height: auto;"
                                >
                            <?php endif; ?>
                        </div>

                        <!-- Nút Lưu thay đổi và Quay lại -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <strong>Lưu thay đổi</strong>
                            </button>
                            <a href="/DemoBanHang/Product" class="btn btn-secondary">
                                <strong>Quay lại danh sách sản phẩm</strong>
                            </a>
                        </div>
                    </form>
                    <!-- Kết thúc form -->
                </div>
                <!-- Kết thúc nội dung Card -->
            </div>
            <!-- Kết thúc thẻ Card -->
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
