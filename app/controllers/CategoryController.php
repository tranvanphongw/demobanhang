<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add()
    {
        // Hiển thị form thêm danh mục
        include 'app/views/category/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            // Gọi hàm thêm danh mục, giả sử hàm addCategory() được định nghĩa trong CategoryModel
            $result = $this->categoryModel->addCategory($name, $description);

            if (is_array($result)) {
                // Nếu có lỗi, hiển thị lại form với thông báo lỗi
                $errors = $result;
                include 'app/views/category/add.php';
            } else {
                header('Location: /DemoBanHang/Category');
            }
        }
    }

    public function edit($id)
    {
        // Giả sử hàm getCategoryById() được định nghĩa trong CategoryModel
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            // Giả sử hàm updateCategory() được định nghĩa trong CategoryModel
            $updated = $this->categoryModel->updateCategory($id, $name, $description);

            if ($updated) {
                header('Location: /DemoBanHang/Category');
            } else {
                echo "Đã xảy ra lỗi khi cập nhật danh mục.";
            }
        }
    }

    public function delete($id)
    {
        // Giả sử hàm deleteCategory() được định nghĩa trong CategoryModel
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /DemoBanHang/Category');
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục.";
        }
    }
}
?>
