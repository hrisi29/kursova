
<section class="py-vh-5" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
              url('./uploads/photo-1542208998-f6dbbb27a72f.jpg');
            background-size: cover;
            background-position: center; ">
    <div class="py-vh-5 container" style=" max-width: 600px;">
        
    <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-8">
                <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-danger" role="alert"> ' . htmlspecialchars($_GET['error']) . '</div>'; //opitah s div class="alert alert-danger" no ne stana mozhe da e neshto ot template-a 
                        //┐(シ)┌	
                    }
                ?>
                <h1 class="h2 mb-4 text-white" style="margin-top:20px;">Login</h1>
                <form method="POST" action="./handlers/handle_login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="<?php echo $_COOKIE['last_login'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-light">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>