<?php

require_once('../functions.php');
require_once('../db.php');

// debug($_POST);
// debug($_FILES);
// exit;

$title = $_POST['title'] ?? '';
$price = $_POST['price'] ?? '';
$artist = $_POST['artist'] ?? '';

if(mb_strlen($title)<=0||mb_strlen($price)<=0){
    $_SESSION['flash']['message']['text'] = "Please fill in all fields!";
    $_SESSION['flash']['message']['type'] = 'danger';
    header("Location: ../index.php?page=add_product");
    exit;
}

if(!isset($_FILES['image']) || $_FILES['image']['error']!=0){
    $_SESSION['flash']['message']['text'] = "Please upload image!";
    $_SESSION['flash']['message']['type'] = 'danger';
    header("Location: ../index.php?page=add_product");
    exit;
}

$new_filename=time().'_'.$_FILES['image']['name'];
$upload_dir = '../uploads/';

//проверка дали директорията съществува
if(!is_dir($upload_dir)){
    mkdir($upload_dir, 0755, true);
}

if(!move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir.$new_filename)){
    $_SESSION['flash']['message']['text'] = "Error uploading image!";
    $_SESSION['flash']['message']['type'] = 'danger';
    header("Location: ../index.php?page=add_product");
    exit;
};

$query = "INSERT INTO products (title, price, image, artist) VALUES (:title, :price, :image, :artist)";
$stmt = $pdo->prepare($query);
$params=[
    ':title'=>$title,
    ':price'=>$price,
    ':image'=>$new_filename,
    ':artist'=>$artist
];
if($stmt->execute($params)){
    $_SESSION['flash']['message']['text'] = "Product added successfully!";
    $_SESSION['flash']['message']['type'] = 'success';
    header("Location: ../index.php?page=products");
    exit;
}

    else {
        $_SESSION['flash']['message']['text'] = "Error adding product!";
        $_SESSION['flash']['message']['type'] = 'danger';
        header("Location: ../index.php?page=add_product");
        exit;
    }
?>