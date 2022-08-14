<?php
include "./helper/helpers.php";

ppp($_REQUEST);


?>

<!doctype html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="src/style/reset.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="src/style/index.css" media="screen" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
      <title>All blacks - Fans</title>
    </head>
    <body>
      <header>
        <img src="src/image/icon.png" class="image_icon" alt="some text">
        <h1>FANS UPDATE SECTION</h1>
      </header>
      <main>
        <div class="container">
          <?php
          if ($_REQUEST["id"] != "info") {
          ?>
            <form action="interpretador.php" method="POST" enctype="multipart/form-data">

              <label class="label-form">ADD TO FAN TABLE<input type="file" name="xlsx" ></label>
              <label class="label-form">ADD UPDATE FILE <input type="file" name="xml" ></label>
              <div class="div-buttons">
                <input class="botao-form" type="submit" alt="Update" value="Update">
                <input class="botao-form" type="button" alt="Update" value="Send Email">
                <a href="?id=info">
                <input class="botao-form" type="button" alt="Update" value="How To Use">
                <input class="botao-form" type="button" alt="Update" value="How To Use">
                </a>
              </div>
            </form>
          <?php } else { ?>
          <h1>HOW TO USE - Em Portugues</h1>
            <br>
            <p>Botão UPDATE:
              Atualiza os dados da tabela inserida com o arquivo XML
             </p>
            <a href="/">
              <input class="botao-form" type="button" alt="Update" value="BACK">
            </a>
          </div>
          <?php } ?>
      </main>
      <footer>
        <img src="src/image/adidas.png" class="image_adidas" alt="some text">
        <div class="list-items">
        <ul class="no-list links useful order-1 order-xl-1">
          <li><a href="https://www.allblacks.com/partners/" class="link" data-cy="footer-link">Partners</a></li>
          <li>•</li>
          <li><a href="https://www.allblacks.com/faq/" class="link" data-cy="footer-link">FAQ</a></li>
          <li>•</li>
          <li><a href="https://www.allblacks.com/about-us/" class="link" data-cy="footer-link">About Us</a></li>
          <li>•</li>
          <li><a href="https://www.allblacks.com/contact-us/" class="link" data-cy="footer-link">Contact Us</a></li>
          <li>•</li>
          <li><a href="https://www.allblacks.com/privacy-policy/" class="link" data-cy="footer-link">Privacy Policies</a></li>
        </ul>
        </div>
        <div class="div-social-media">
          <ul class="social-media no-list">
            <li>
              <a href="https://www.facebook.com/AllBlacks" data-cy="footer-social-fb">
                <i class="fab fa-facebook-f "></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/allblacks" data-cy="footer-social-twitter">
                <i class="fab fa-twitter "></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/allblacks" data-cy="footer-social-ins">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
      </footer>
      <script src="https://kit.fontawesome.com/1f678b4511.js" crossorigin="anonymous"></script>
    </body>
  </html>