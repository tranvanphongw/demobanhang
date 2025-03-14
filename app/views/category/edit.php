<?php include 'app/views/shares/header.php'; ?>

<?php if (!isset($category) || !is_object($category)): ?>
    <p>Danh mục không tồn tại hoặc dữ liệu bị lỗi.</p>
<?php else: ?>

    <h1>Sửa danh mục</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/DemoBanHang/Category/update">
        <input type="hidden" name="id" value="<?php echo $category->id; ?>">

        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" id="name" name="name" class="form-control" 
                   value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>

    <a href="/DemoBanHang/Category" class="btn btn-secondary mt-2">Quay lại danh sách danh mục</a>

<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
