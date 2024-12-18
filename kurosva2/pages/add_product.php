<?php
    // добавяне/редакция на продукт
?>

<section class="py-vh-5" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('./uploads/photo-1542208998-f6dbbb27a72f.jpg'); background-size: cover; background-position: center; height: 947px;">
        <div class="container" style="margin-top: 170px; max-width: 600px;" >
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    
                    <h1 class="h1 mb-4 text-white">Add Product</h1>
                    <form method="POST" action="./handlers/handle_add_product.php" >
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Artist:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price">
                        </div>
                             <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                        <button type="submit" class="btn btn-outline-light">Add</button>
                </form>
                </div>
            </div>
        </div>
</section>
