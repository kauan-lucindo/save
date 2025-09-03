<?php
session_start();
require "php/config.php";
if (isset($_SESSION['email'])) {

    $nome = $_SESSION['nome'];

}

$cor1 = "#b700ff";
$cor2 = "#000";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Choice store</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle" />

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="media.css/media-home.css">

    <link rel="icon" href="img-your-choice/icon-site-3_resized.ico" type="image/x-icon">
</head>



<body>

    <div class="header">

        <div class="container-complemento">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="index.php"><img id="logo-navbar" src="img-your-choice/logo_your_choice_sf.png"
                                width="125px"></a>
                    </div>
                    <nav>
                        <ul class="" id="MenuItems">
                            <li><a id="home" href="index.php">Home</a></li>
                            <li><a id="product-navbar" href="products.html">Produtos</a></li>
                            <li><a id="about" href="about-us.html">Sobre nós</a></li>
                            <li><a id="contact" href="contact.html">Contato</a></li>
                            <!-- <li class="conta-midia"><a href="accountpage.php">conta</a></li> -->



                        </ul>
                    </nav>
                    <img src="img-your-choice/menu.png" class="menu-icon" onclick="menutoggle()">

                    <div class="align">
                        <div class="dropBtn">
                            <span id="acount" class="material-symbols-outlined">account_circle</span>
                            <div class="dropDownContent">
                                <?php
                                if (isset($_SESSION['email'])) {
                                    echo "<a style='color:$cor1;' href=\"sair.php\">sair</a>";
                                } else {
                                    echo "<a style='color:$cor1;' href=\"accountpage.php\">entrar</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <a href="cart.php"><img class="cart" src="img-your-choice/cart.png" width="30px"
                                height="30px"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-2">
                    <?php
                    if (isset($_SESSION['email'])) {
                        ?>
                        <h1 class="hello-user">Bem vindo
                            <?php
                            echo "<u style='color:$cor1;'>$nome</u>"
                                ?>
                        </h1>
                        <?php
                    }
                    ?>
                    <h1>Seu estilo, <br> Nossa missão!</h1>
                    <p>O sucesso nem sempre é sobre grandeza, é sobre consistência<br>
                        o trabalho duro sempre ira ganhar sucesso. E o sucesso virá! </p>
                    <a href="products.html" class="btn">Explore agora!</a>
                </div>
                <div class="col-2">
                    <img src="img-your-choice/main-marktin-removebg-preview.png">
                </div>
            </div>
        </div>
    </div>

    <!------------------- featured catergories ------------------->

    <div class="categories">
        <div class="small-container">
            <div class="row">

                <div class="col-3 after1"><a href="#copos"><img class=""
                            src="img-your-choice/img-rediresionamento-1_resized.jpg"></a>
                </div>

                <div class="col-3 after2"><a href="#c-pr"><img
                            src="img-your-choice/img-rediresionamento-2_resized.jpg"></a>
                </div>

                <div class="col-3 after3"><a href="#c-p"><img
                            src="img-your-choice/img-rediresionamento-3_resized.jpg"></a>
                </div>

            </div>
        </div>

    </div>

    <!------------------- featured products ------------------->
    <div class="small-container">
        <h2 id="copos" class="title">Camisetas</h2>
        <div class="row">
            <div class="col-4">
                <a href="productdetail.html"><img src="img camisas/img-camisa1-Photoroom.png"></a>
                <a href="productdetail.html">
                    <h4>Anatomia Sombria</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail2.html"><img src="img camisas/img-camisa2.jpg"></a>
                <a href="productdetail2.html">
                    <h4>Serpente & Rosa</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail3.html"><img src="img camisas/img-3_resized-Photoroom.png"></a>
                <a href="productdetail3.html">
                    <h4>Amor Sombrio</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail4.html"><img src="img camisas/img-camisa-4_resized-Photoroom.png"></a>
                <a href="productdetail4.html">
                    <h4>Hamlet: Edição Shakespurr</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>
        </div>

        <h2 id="c-pr" class="title">Canecas</h2>
        <div class="row">
            <div class="col-4">
                <a href="productdetail5.html"><img src="img caneca/img-caneca1-product-page.png"></a>
                <a href="productdetail5.html">
                    <h4>Hi-Top Sneakers</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail6.html"><img src="img caneca/img-caneca2-product-page.png"></a>
                <a href="productdetail6.html">
                    <h4>Black Tiger T-Shirt</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail7.html"><img src="img caneca/img-caneca3-prudct-page.png"></a>
                <a href="productdetail7.html">
                    <h4>Black/White Socks</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>

            <div class="col-4">
                <a href="productdetail8.html"><img src="img caneca/img-caneca4-prudct-page.png"></a>
                <a href="productdetail8.html">
                    <h4>Black Watch</h4>
                </a>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>
        </div>

    </div>

    <!----------------offer------------->
    <div id="c-p" class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img style="filter: drop-shadow(0px 4px 1px rgba(0,0,0,0.5));" src="img camisas/img-camisa-main.png"
                        class="offer-img">
                </div>
                <div class="col-2">
                    <p>Personalize sua camiseta com a <strong>YOUR CHOICE</strong>.</p>
                    <h1>Camisas ao seu estilo.</h1>
                    <small>
                        Crie camisetas e canecas personalizadas do seu jeito, com o seu estilo e a sua personalidade.
                        Expresse quem você é em cada detalhe!<br>
                    </small>
                    <a href="" class="btn">Compre agora!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- offer -->


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

    <!-------------------------js for toggle menu------------------->

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

    <script>
        // Lê os parâmetros da URL
        const params = new URLSearchParams(window.location.search);
        const usuario = params.get("usuario");

        if (usuario) {
            alert(`Usuário ${usuario} cadastrado com sucesso!`);
        }
    </script>

</body>

</html>