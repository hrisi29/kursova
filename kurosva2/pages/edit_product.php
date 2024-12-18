<?php
    // добавяне/редакция на продукт
    $product_id = intval($_GET['product_id'] ?? 0);

    if ($product_id <= 0) {
        $_SESSION['flash']['message']['type'] = 'danger';
        $_SESSION['flash']['message']['text'] = "Грешен идентификатор на продукт!";
        header('Location: ./index.php?page=products');
        exit;
    }

    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $product_id]);
    $product = $stmt->fetch();

    // debug($product);
?>
<section class="py-vh-5" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('./uploads/photo-1542208998-f6dbbb27a72f.jpg'); background-size: cover; background-position: center; height: 947px;">
        <div class="container" style="margin-top: 170px; max-width: 600px;" >
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    
<form method="POST" action="./handlers/handle_edit_product.php" enctype="multipart/form-data">
    <h3 class="text-center">Edit product</h3>
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $product['name'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $product['price'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>

    <div class="mb-3">
        <img src="./uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" class="img-thumbnail">
    </div>
    <input type="hidden" name="product_id" value="<?php echo $product['id'] ?? 0 ?>">
    <button type="submit" class="btn btn-success mx-auto">Edit</button>
</form>

</div>
            </div>
        </div>
</section>