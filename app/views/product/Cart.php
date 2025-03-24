    <?php include 'app/views/shares/header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4 text-center"><strong>Giỏ hàng của bạn</strong></h1>

        <?php if (!empty($cart)): ?>
            <ul class="list-group">
                <?php foreach ($cart as $id => $item): ?>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <?php if (!empty($item['image'])): ?>
                                <img src="/DemoBanHang/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                    alt="Product Image" class="img-thumbnail me-3" style="max-width: 100px;">
                            <?php endif; ?>
                            <div>
                                <h5 class="mb-1"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p class="mb-1 text-muted">
                                    Giá: <strong class="text-danger"><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</strong>
                                </p>
                                <p class="mb-0">Số lượng: <strong><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="mt-4 text-center">
                <a href="/DemoBanHang/Product" class="btn btn-outline-secondary me-2">← Tiếp tục mua sắm</a>
                <a href="/DemoBanHang/Product/checkout" class="btn btn-success">Thanh Toán →</a>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Giỏ hàng của bạn đang trống.</div>
            <div class="text-center">
                <a href="/DemoBanHang/Product" class="btn btn-primary">Quay lại cửa hàng</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'app/views/shares/footer.php'; ?>
