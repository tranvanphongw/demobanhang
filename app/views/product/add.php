<?php include 'app/views/shares/header.php'; ?>
<h1>Thêm sản phẩm mới</h1>
<form id="add-product-form">
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
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>
<a href="/DemoBanHang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
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

    // Xử lý submit form thêm sản phẩm
    document.getElementById('add-product-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = this;
        const formData = new FormData(form);
        const jsonData = {};

        // Chuyển đổi dữ liệu từ form sang JSON, bỏ qua trường file
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
                sendProduct(jsonData);
            }
            reader.readAsDataURL(imageInput.files[0]);
        } else {
            // Nếu không chọn ảnh, gán chuỗi rỗng hoặc null
            jsonData.image = '';
            sendProduct(jsonData);
        }
    });

    function sendProduct(jsonData) {
        fetch('/DemoBanHang/api/product', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(text => {
            console.log('Raw response:', text);
            try {
                const data = text;
                if (data.message === 'Product created successfully') {
                    location.href = '/DemoBanHang/Product';
                } else {
                    alert('Thêm sản phẩm thất bại');
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
                alert('Lỗi: Không thể phân tích JSON từ phản hồi của máy chủ.');
            }
        });
    }
});
</script>
