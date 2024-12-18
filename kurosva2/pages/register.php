<?php
    // страница login
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
    }
?>

<section class="py-vh-5  top-0 start-0"
          style="
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
              url('./uploads/photo-1542208998-f6dbbb27a72f.jpg');
            background-size: cover;
            background-position: center;
          ">
        <div class="container" style="margin-top: 170px; max-width: 600px;" >
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <h1 class="h3 mb-4 text-white">Register</h1>
                    <form method="POST" action="./handlers/handle_register.php" >
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name">
                        </div> 
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                           <div class="mb-3">
                            <label for="password" class="form-label">Repeat password</label>
                            <input type="password" class="form-control" id="repat_password" name="repeat_password">
                        </div>
                        <button type="submit" class="btn btn-outline-light">Register</button>
                </form>
                </div>
            </div>
        </div>
</section>
