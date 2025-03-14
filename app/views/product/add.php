<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Tùy ý chọn col-md-6, col-md-8... để điều chỉnh độ rộng -->
        <div class="col-md-8">
            <!-- Bắt đầu Card -->
            <div class="card shadow">
                <!-- Tiêu đề Card -->
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Thêm sản phẩm mới</h4>
                </div>
                <!-- Nội dung Card -->
                <div class="card-body">
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

                    <!-- Form thêm sản phẩm -->
                    <form method="POST" action="/DemoBanHang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">Tên sản phẩm:</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form-control" 
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
                            ></textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="price" class="font-weight-bold">Giá:</label>
                            <input 
                                type="number" 
                                id="price" 
                                name="price" 
                                class="form-control" 
                                step="0.01" 
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
                                    <option value="<?php echo $category->id; ?>">
                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="image" class="font-weight-bold">Hình ảnh:</label>
                            <input 
                                type="file" 
                                id="image" 
                                name="image" 
                                class="form-control"
                            >
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                Thêm sản phẩm
                            </button>
                            <a href="/DemoBanHang/Product" class="btn btn-secondary">
                                Quay lại danh sách sản phẩm
                            </a>
                        </div>
                    </form>
                    <!-- Kết thúc Form -->
                </div>
                <!-- Kết thúc nội dung Card -->
            </div>
            <!-- Kết thúc Card -->
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
