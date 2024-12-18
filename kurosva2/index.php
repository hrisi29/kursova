<?php
// boilerplate index
require_once('functions.php');
require_once('./db.php');

$page = $_GET['page'] ?? 'home';

$flash = [];
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

?>
<!DOCTYPE html>
<html class="h-100" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <meta
      name="description"
      content="A well made and handcrafted Bootstrap 5 template"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="img/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="img/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="img/favicon-16x16.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="96x96"
      href="img/favicon.png"
    />
    <link rel="icon" href="uploads\Bootstrap-file-music-fill-icon-orange.png" type="image/png">
    <title>Sound Station</title>
    <link rel="stylesheet" href="css/theme.min.css" />
    
<!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
      /* inter-300 - latin */
      @font-face {
        font-family: "Inter";
        font-style: normal;
        font-weight: 300;
        font-display: swap;
        src: local(""), url("fonts/inter-v12-latin-300.woff2") format("woff2"),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
            url("fonts/inter-v12-latin-300.woff") format("woff");
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }

      @font-face {
        font-family: "Inter";
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local(""),
          url("fonts/inter-v12-latin-regular.woff2") format("woff2"),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
            url("fonts/inter-v12-latin-regular.woff") format("woff");
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }

      @font-face {
        font-family: "Inter";
        font-style: normal;
        font-weight: 500;
        font-display: swap;
        src: local(""), url("fonts/inter-v12-latin-500.woff2") format("woff2"),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
            url("fonts/inter-v12-latin-500.woff") format("woff");
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }

      @font-face {
        font-family: "Inter";
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: local(""), url("fonts/inter-v12-latin-700.woff2") format("woff2"),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
            url("fonts/inter-v12-latin-700.woff") format("woff");
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }
    </style>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
    // fade in
    $(document).ready(function() {
        $('section').hide().fadeIn(1000);
    });

</script> 
</head>

  <body
    class="bg-black text-white mt-0"
    data-bs-spy="scroll"
    data-bs-target="#navScroll"
  >
  <script>
    $(function(){
        //добавяне
            $(document).on('click', '.add-favorite', function(){
                let btn= $(this);
                let productId =btn.data('product');
                
                $.ajax({
                    url: './ajax/add_favorite.php',
                    method: 'POST',
                    data: {
                        product_id: productId
                    },
                    success: function(response){
                        
                         let res = JSON.parse(response);
                         if(res.success){
                            alert('Product successfully added to favorites');
                            let removeBtn=$(`<button type="button" class="btn btn-sm btn-outline-warning remove-favorite" data-product="${productId}"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></button>`);
                            btn.replaceWith(removeBtn);
                        }else{
                            alert(res.error);
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            })
    //премахване
     $(document).on('click', '.remove-favorite', function(){
                let btn= $(this);
                let productId =btn.data('product');
                
                $.ajax({
                    url: './ajax/remove_favorite.php',
                    method: 'POST',
                    data: {
                        product_id: productId
                    },
                    success: function(response){
                         let res = JSON.parse(response);
                         if(res.success){
                            alert('Product successfully removed from favorites');

                            let addBtn=$(`<button type="button" class="btn btn-sm btn-outline-warning add-favorite" data-product="${productId}"><i class="fa-regular fa-star" style="color: #FFD43B;"></i></button>`);
                            btn.replaceWith(addBtn);
                        }else{
                            alert(res.error);
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            })
       });

  </script>
    <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
      <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-right" href="index.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-music-fill" viewBox="0 0 16 16">
            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-.5 4.11v1.8l-2.5.5v5.09c0 .495-.301.883-.662 1.123C7.974 12.866 7.499 13 7 13s-.974-.134-1.338-.377C5.302 12.383 5 11.995 5 11.5s.301-.883.662-1.123C6.026 10.134 6.501 10 7 10c.356 0 .7.068 1 .196V4.41a1 1 0 0 1 .804-.98l1.5-.3a1 1 0 0 1 1.196.98z"/>
          </svg>
          <span class="ms-md-1 mt-1 fw-bolder me-md-1">Sound Station</span>
        </a>

    <!-- Nav Links -->
        <ul class="navbar-nav mx-auto mb-1 mb-lg-0 list-group list-group-horizontal">
          <li class="nav-item">
            <a class="nav-link fs-3" aria-current="page" href="?page=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3" href="?page=products" aria-label="Products page">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3" href="?page=add_product" aria-label="Add product">Add product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3" href="?page=contact_us" aria-label="Contact us page">Contact us</a>
          </li>
        </ul>

    <!-- Buttons: Login, Logout, Register -->
        <div class="d-flex align-items-center">
          <?php
            if (isset($_SESSION['username'])) {
              echo '
                <form method="POST" action="./handlers/handle_logout.php" class="m-0 me-2">
                  <button type="submit" class="btn btn-outline-light">Logout, '. $_SESSION['username'] . '?</button>
                </form>
              ';
            } else {
              echo '<a href="?page=login" class="btn btn-outline-light me-2">Login</a>';
              echo '<a href="?page=register" aria-label="Register" class="btn btn-outline-light"><small>Register</small>
               </a>';
            }
          ?>
        </div>
  </div>
</nav>

<!-- main   -->
<main>
      <?php
            if (isset($flash['message'])) {
                echo '
                    <div class="alert alert-' . $flash['message']['type'] . '">
                        ' . $flash['message']['text'] . '
                    </div>
                ';
            }

            if (file_exists("pages/$page.php")) {
                require_once("pages/$page.php");
            } else {
                require_once("pages/not_found.php");
            }
        ?>
</main>


    <!-- footer -->
<footer class="bg-black border-top border-dark">
      
      <div class="container text-center small py-vh-2 border-top border-dark">
        Template made by
        <a
          href="https://templatedeck.com"
          class="link-fancy link-fancy-light"
          target="_blank"
          >templatedeck.com</a
        >
        . Distributed by
        <a
          href="https://themewagon.com"
          class="link-fancy link-fancy-light"
          target="_blank"
          >ThemeWagon</a
        >
      
</footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/aos.js"></script>
    <script>
      AOS.init({
        duration: 800, // values from 0 to 3000, with step 50ms
      });
    </script>
    <script>
      let scrollpos = window.scrollY;
      const header = document.querySelector(".navbar");
      const header_height = header.offsetHeight;

      const add_class_on_scroll = () =>
        header.classList.add("scrolled", "shadow-sm");
      const remove_class_on_scroll = () =>
        header.classList.remove("scrolled", "shadow-sm");

      window.addEventListener("scroll", function () {
        scrollpos = window.scrollY;

        if (scrollpos >= header_height) {
          add_class_on_scroll();
        } else {
          remove_class_on_scroll();
        }

        console.log(scrollpos);
      });
    </script>
  </body>
</html>