<?php include 'app/views/shares/header.php'; ?>
<h1>Sửa sản phẩm</h1>
<form id="edit-product-form">
    <input type="hidden" id="id" name="id">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API và hiển thị tại đây -->
        </select>
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm:</label>
        <input type="file" id="image" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
<a href="/DemoBanHang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const productId = <?= $editId ?>;
    
    // Lấy thông tin sản phẩm theo ID
    fetch(`/DemoBanHang/api/product/${productId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('id').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description;
            document.getElementById('price').value = data.price;
            // Gán giá trị cho danh mục nếu có
            document.getElementById('category_id').value = data.category_id;
        });

    // Lấy danh sách danh mục từ API
    fetch('/DemoBanHang/api/category')
        .then(response => response.json())
        .then(data => {
            const categorySelect = document.getElementById('category_id');
            data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
        });

    // Xử lý submit form chỉnh sửa sản phẩm
    document.getElementById('edit-product-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = this;
        const formData = new FormData(form);
        const jsonData = {};

        // Chuyển đổi dữ liệu từ form sang JSON (bỏ qua trường file)
        formData.forEach((value, key) => {
            if (key !== 'image') {
                jsonData[key] = value;
            }
        });

        const imageInput = document.getElementById('image');
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.onloadend = function() {
                jsonData.image = reader.result; // Chuỗi base64 của ảnh
                sendUpdate(jsonData);
            }
            reader.readAsDataURL(imageInput.files[0]);
        } else {
            // Nếu không chọn ảnh mới, giữ nguyên giá trị hiện tại (hoặc gán rỗng nếu muốn cập nhật là không có ảnh)
            jsonData.image = '';
            sendUpdate(jsonData);
        }
    });

    function sendUpdate(jsonData) {
        fetch(`/DemoBanHang/api/product/${jsonData.id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product updated successfully') {
                location.href = '/DemoBanHang/Product';
            } else {
                alert('Cập nhật sản phẩm thất bại');
            }
        });
    }
});
</script>
