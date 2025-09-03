<?php
session_start();
include "php/config.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['recSenhaBtn'])){

    var_dump($dados);

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha - Your Choice</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="icon" href="img-your-choice/icon-site-3_resized.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/media.css/acount-media.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rec.css">

</head>
<body>
     <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img id="logo-navbar" src="img-your-choice/logo_your_choice_sf.png"
                            width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a id="home" href="index.php">Home</a></li>
                    <li><a id="product-navbar" href="products.html">Produtos</a></li>
                    <li><a id="about" href="about-us.html">Sobre nós</a></li>
                    <li><a id="contact" href="contact.html">Contato</a></li>
                    <!-- <li><a id="acount" href="">Conta</a></li> -->
                </ul>
            </nav>
            <img src="img-your-choice/menu.png" class="menu-icon" onclick="menutoggle()">
            <a href="cart.php"><img class="cart" src="img-your-choice/cart.png" width="30px" height="30px"></a>
        </div>
    </div>

    <!---------------------------account page--------------->

    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="img-your-choice/logo_your_choice_sf.png" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container-rec">

                        <div class="form-btn">
                            <p class="rec">Recuperar senha</p>
                        </div>

                        <form action="testeLogin.php" method="POST" id="RecForm">
                            <input name="recSenha" type="text" placeholder="Emal" required>
                            <div class="display">
                                <button name="recSenhaBtn" type="submit"  class="btn">Login</button>
                                <a class="recuperar" href="recuperar.php">Esqueceu a senha</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--------------------------------------footer---------------------------->

    <div class="footer">
        <div class="container">
            <div class="row row-footer">

                <div class="footer-col-2">
                    <img class="logo-footer" src="img-your-choice/logo-your_choice.png">
                    <p class="media-p">Sua experiência de <strong>personalização</strong> de um jeito nunca antes visto.
                    </p>
                </div>

                <div class="footer-col-3">
                    <h3>Nos siga</h3>
                    <ul>
                        <a class="rediricionamento" href="">
                            <li>Whatsapp</li>
                        </a>
                         <a class="rediricionamento" target="_blank" href="https://www.instagram.com/_yourchoicestore/">
                            <li>Instagram</li>
                        </a>
                    </ul>
                </div>

            </div>
            <hr>
            <p class="Copyright">Copyright 2025 - Your Choice store</p>
        </div>
    </div>


    <script>
        var MenuItems = document.getElementById("MenuItems")

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            } else {
                MenuItems.style.maxHeight = "0px";

            }

        }
    </script>
</body>
</html>