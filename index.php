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
            <form action="exe_atualizar_arquivo.php" method="POST" enctype="multipart/form-data">
              <label id="arquivo" class="label-form">ADD UPDATE FILE <input type="file" name="arquivo" required></label>
              <div class="div-buttons">
                <input class="botao-form" type="submit" alt="Update" value="Update">
                <input class="botao-form" type="button" alt="Update" value="Send Email">
                <a href="./clientes.xlsx">
                <input class="botao-form" type="button" alt="Update" value=" Download ">
                </a>
              </div>
            </form>
          </div>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function () {
          $('form').submit(function (event) {
              // event.preventDefault();
              var file = document.getElementById('arquivo');
              console.log(file);
          })
        })
      </script>
    </body>
  </html>