<?php
    // страница продукти
    $products = [];

    $search = $_GET['search'] ?? '';
    // заявка към базата данни
    $sql = 'SELECT * FROM products WHERE name LIKE :search';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => '%' . $search . '%']);

    while ($row = $stmt->fetch()) {
        $fav_query = "SELECT id FROM favorite_products_users WHERE user_id = :user_id AND product_id = :product_id";
        $fav_stmt = $pdo->prepare($fav_query);
        $fav_params = [
            ':user_id' => $_SESSION['user_id'] ?? 0,
            ':product_id' => $row['id']
        ];
        $fav_stmt->execute($fav_params);
        $row['is_favorite'] = $fav_stmt->fetch() ? 1 : 0;

        $products[] = $row;
    }

    if (mb_strlen($search) > 0) {
        setcookie('last_search', $search, time() + 3600, '/', '', false, false);
    }
?>


<section style="max-width: 927px; margin: 0 auto;">
<div class="row">
    
    <form class="mb-5" style="margin-top: 100px" method="GET">
        <div class="input-group">
            <input type="hidden" name="page" value="products">
            <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search ?>">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </div>
    </form>

</div>
<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php
        foreach ($products as $product) {
            $fav_button = '';
            if (isset($_SESSION['username'])) {
                if ($product['is_favorite'] == '1') {
                    $fav_button = '
                    <div class="card-footer text-center">
                            <button type="button" class="btn btn-sm add-favorite btn-outline-warning" data-product="' . $product['id'] . '">
                            <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                        </button>
                        <a href="?page=edit_product&product_id=' . $product['id'] . '" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-pencil-alt" style="color: #63e6be;"></i></a>
                        
          <button type="button" class="btn btn-sm btn-delete delete-product btn-outline-danger" data-product="' . $product['id'] . '">
         <i class="fa-solid fa-trash-can" style="color: #ec3232;"></i>
          </button>
                        </div>   
                    ';
                } else {
                    $fav_button = '
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-sm add-favorite btn-outline-warning" data-product="' . $product['id'] . '">
                            <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                        </button>

                        <a href="?page=edit_product&product_id=' . $product['id'] . '" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-pencil-alt" style="color: #63e6be;"></i>
                        </a>
                        <form method="POST" action="./handlers/handle_delete_product.php">
                            <input type="hidden" name="product_id" value="' . $product['id'] . '">
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can" style="color: #ec3232;"></i></button>
                        </form>
                        
                                    </div>';
                    
                }
            }

            echo '
                <div class="col mb-4">
                    <div class="card h-100 bg-dark text-white">
                        <img src="' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>
                            <h5 class="card-title">' . htmlspecialchars($product['artist']) . '</h5>
                            <p class="card-text">' . htmlspecialchars($product['price']) . '</p>
                        </div>
                        ' . $fav_button . '
                    </div>
                </div>
            ';
        }
    ?>
</div>
</section>