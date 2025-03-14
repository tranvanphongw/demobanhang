<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Danh sách danh mục</h1>
    <a href="/DemoBanHang/Category/add" class="btn btn-success mb-4">Thêm danh mục mới</a>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($categories as $category): ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                    <div class="card-footer text-end">
                        <a 
                            href="/DemoBanHang/Category/edit/<?php echo $category->id; ?>" 
                            class="btn btn-warning btn-sm"
                        >
                            Sửa
                        </a>
                        <a 
                            href="/DemoBanHang/Category/delete/<?php echo $category->id; ?>" 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');"
                        >
                            Xóa
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
