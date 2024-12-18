

<section class="py-vh-5" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
              url('./uploads/photo-1542208998-f6dbbb27a72f.jpg');
            background-size: cover;
            background-position: center; height: 947px;">
    <div class="py-vh-5 container" style="max-width:700px;" >

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-8">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $errors = [];
                        foreach ($_POST as $key => $value) {
                            if ($key != 'submit' && empty($value)) {
                                $errors[] = "The $key field has not been filled!";
                            }
                        }
                        if (count($errors) > 0) {
                            echo '<div class="alert alert-danger" role="alert" style="border-radius: 10px;">';
                                foreach ($errors as $error) {
                                    echo "<p>$error</p>";
                                }
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-success" role="alert"  border-radius: 10px; ">We appreciate your feedback, ' . htmlspecialchars($_POST['name']) . '! You will recieve a response at the email address ' . htmlspecialchars($_POST['email']) . '!</div>';
                        }
                    }
                ?>
                <h1 class="h3 mb-4 text-white" style="margin-top:10px;">Contact Us</h1>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Name</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Your email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-white">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4"  placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-light" >Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
