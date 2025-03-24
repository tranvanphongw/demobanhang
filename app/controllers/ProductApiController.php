<?php
require_once('app/config/database.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');

class ProductApiController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    // -------------------- Hàm xử lý ảnh base64 --------------------
    private function handleBase64Image($base64)
    {
        // Nếu không có dữ liệu ảnh, trả về chuỗi rỗng
        if (empty($base64)) {
            return '';
        }

        // Chuỗi base64 thường có dạng: data:image/png;base64,AAAA...
        if (preg_match('/^data:image\\/(\\w+);base64,/', $base64, $type)) {
            $extension = $type[1]; // ví dụ: png, jpg, jpeg, gif
            $base64 = substr($base64, strpos($base64, ',') + 1); // cắt bỏ phần header
            $decodedData = base64_decode($base64);

            if ($decodedData === false) {
                // Giải mã thất bại
                return '';
            }
        } else {
            // Không đúng định dạng base64 ảnh
            return '';
        }

        // Tạo tên file duy nhất
        $fileName = 'uploads/' . uniqid() . '.' . $extension;

        // Tạo thư mục uploads nếu chưa có
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Lưu file
        file_put_contents($fileName, $decodedData);

        // Trả về đường dẫn file để lưu vào DB
        return $fileName;
    }

    // -------------------- Lấy danh sách sản phẩm --------------------
    public function index()
    {
        header('Content-Type: application/json');
        $products = $this->productModel->getProducts();
        echo json_encode($products);
    }

    // -------------------- Lấy thông tin sản phẩm theo ID --------------------
    public function show($id)
    {
        header('Content-Type: application/json');
        $product = $this->productModel->getProductById($id);
        if ($product) {
            echo json_encode($product);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Product not found']);
        }
    }

    // -------------------- Thêm sản phẩm mới --------------------
    public function store()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $price = $data['price'] ?? '';
        $category_id = $data['category_id'] ?? null;
        $base64Image = $data['image'] ?? ''; // Chuỗi base64

        // Giải mã base64 và lưu file => trả về đường dẫn file
        $imagePath = $this->handleBase64Image($base64Image);

        $result = $this->productModel->addProduct($name, $description, $price, $category_id, $imagePath);

        if (is_array($result)) {
            http_response_code(400);
            echo json_encode(['errors' => $result]);
        } else {
            http_response_code(201);
            echo json_encode(['message' => 'Product created successfully']);
        }
    }

    // -------------------- Cập nhật sản phẩm theo ID --------------------
    public function update($id)
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data['name'] ?? '';
        $description = $data['description'] ?? '';
        $price = $data['price'] ?? '';
        $category_id = $data['category_id'] ?? null;
        $base64Image = $data['image'] ?? ''; // Chuỗi base64

        // Giải mã base64 và lưu file => trả về đường dẫn file
        $imagePath = $this->handleBase64Image($base64Image);

        // Nếu người dùng không upload ảnh mới (imagePath rỗng), ta giữ ảnh cũ
        if (empty($imagePath)) {
            $oldProduct = $this->productModel->getProductById($id);
            if ($oldProduct) {
                $imagePath = $oldProduct->image; 
            }
        }

        $result = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $imagePath);

        if ($result) {
            echo json_encode(['message' => 'Product updated successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Product update failed']);
        }
    }

    // -------------------- Xóa sản phẩm theo ID --------------------
    public function destroy($id)
    {
        header('Content-Type: application/json');
        $result = $this->productModel->deleteProduct($id);
        if ($result) {
            echo json_encode(['message' => 'Product deleted successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Product deletion failed']);
        }
    }
}
