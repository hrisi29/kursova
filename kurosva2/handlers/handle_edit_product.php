<?php

require_once('../functions.php');
require_once('../db.php');

// debug($_POST);
// debug($_FILES);
// exit;

$name = $_POST['name'] ?? '';
$artist = $_POST['artist'] ?? '';
$price = $_POST['price'] ?? '';
$product_id = intval($_POST['product_id'] ?? 0);

if(mb_strlen($name)<=0||mb_strlen($price)<=0 || $product_id<=0||mb_strlen($artist)<=0){
    $_SESSION['flash']['message']['text'] = "Моля попълнете всички полета!";
    $_SESSION['flash']['message']['type'] = 'danger';
    header('Location: ../index.php?page=edit_product&product_id=' .$product_id);
    exit;
}

$img_uploaded = false;
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $new_filename=time().'_'.$_FILES['image']['name'];
    $upload_dir = '../uploads/';

    // проверка дали директорията съществува
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

if(!move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir.$new_filename)){
        $_SESSION['flash']['message']['text'] = "Error uploading image!";
        $_SESSION['flash']['message']['type'] = 'danger';
        header("Location: ../index.php?page=edit_product&product_id=" . $product_id);
        exit;
    }else {
        $img_uploaded = true;
    }
}
$query = '';
if($img_uploaded){
    $query = "UPDATE products SET name = :name, price = :price, artist=:artist, image=:image WHERE id = :id";
}
else {
    $query = "UPDATE products SET name = :name, price = :price, artist=:artist WHERE id = :id";
} 
$stmt = $pdo->prepare($query);
$params=[
    ':name'=>$name,
    ':price'=>$price,
    ':artist'=>$artist,
    ':id'=>$product_id
];
if($img_uploaded){
    $params[':image'] = $new_filename;
}
if($stmt->execute($params)){
    $_SESSION['flash']['message']['text'] = "Продуктът е редактиран успешно!";
    $_SESSION['flash']['message']['type'] = 'success';
}else {
        $_SESSION['flash']['message']['text'] = "Възникна грешка!";
        $_SESSION['flash']['message']['type'] = 'danger';
        
}
header("Location: ../index.php?page=edit_product&product_id=" . $product_id);
exit;


?>