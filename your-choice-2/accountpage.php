<?php
session_start();

require 'php/config.php';

if(isset($_SESSION['email'])){

    echo "<script>
            alert('Você ja esta logado');
            window.location.href = 'index.php';
          </script>";

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];



    $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {

        echo "<script>
            alert('Este e-mail já está cadastrado!');
            window.location.href = 'accountpage.php';
          </script>";

        exit;
    } else {
        // Faz o insert
        $sql = "INSERT INTO usuarios (usuario, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario, $email, $senha]);

        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    }

    header(header: "Location: index.php?usuario=" . urlencode(string: $usuario));
    exit();

}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Your Choice</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="icon" href="img-your-choice/icon-site-3_resized.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/media.css/acount-media.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/accountPage.css">
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
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Registrar</span>
                            <span onclick="login()">Login</span>
                            <hr id="Indicator">
                        </div>



                        <div class="aling-form">

                            <form action="testeLogin.php" method="POST" id="RegForm">
                                <input name="emailLogin" type="text" placeholder="Email" required>
                                <input name="senhaLogin" id="password" placeholder="Senha" type="password" required>
                                <div class="display">
                                    <button name="submitLogin" type="submit" value="Enviar"
                                        class="btn-login">Login</button>
                                    <a class="recuperar" href="recuperar.php">Esqueceu a senha</a>
                                </div>
                            </form>

                            <form action="" method="POST" id="LoginForm" onsubmit="return validarForm()">
                                <input type="text" name="usuario" placeholder="Usuário" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input id="passwordForm" type="password" name="senha" placeholder="senha" required>
                                <input id="passwordConfirm" type="password" placeholder="confirme a senha" required>
                                <div class="alinhar-btnReg">
                                    <button type="submit" id="regButon" class="btn-register">Registrar</button>

                                    <div id="erros">
                                        <div class="erro1">
                                            <span id="erroSenhaConfirm">Erro: As senhas não coincidem!</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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

    <!------------------------js for toggle menu------------------>


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

    <!------------------------js for toggle form------------------>

    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function login() {

            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }

        function register() {

            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }
    </script>

    <!------------------------js confirmar senha------------------>
    <script>

        function validarForm() {
            const senha = document.getElementById("passwordForm").value;
            const senhaConfirm = document.getElementById("passwordConfirm").value;
            const erro1 = document.getElementById("erros")

            if (senha !== senhaConfirm) {


                erro1.style.display = "block";

                document.getElementById("passwordForm").value = ""
                document.getElementById("passwordConfirm").value = "";

                erro1.style.animation = "none";
                setTimeout(() => { erro1.style.animation = "shake 0.5s ease-in-out"; }, 10);
                return false

            } else {

                return true

            }

        }

    </script>
</body>

</html>