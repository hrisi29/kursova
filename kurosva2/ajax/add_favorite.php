<?php
require_once('../db.php');

$response = [
    'success' => true,
    'error' => '',
    'data' => []
];

$product_id = intval($_POST['product_id'] ?? 0);

if ($product_id <= 0) {
    $response['success'] = false;
    $response['error'] = 'Invalid product ID';
} else {
    $user_id = $_SESSION['user_id'];
    $sql = 'INSERT INTO favorite_products_users (user_id, product_id) VALUES (:user_id, :product_id)';
    $stmt = $pdo->prepare($sql);
    $params = [
        'user_id' => $user_id,
        'product_id' => $product_id
    ];
    if (!$stmt->execute($params)) {
        $response['success'] = false;
        $response['error'] = 'Error adding product to favorites';
    }
}

echo json_encode($response);
exit;

?>