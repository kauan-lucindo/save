<?php
    session_start();
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){

        unset($_SESSION['email']);
        unset($_SESSION['senha']);

        header('Location: accountpage.php');
    }
    $logado = $_SESSION['email'];
    $nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        echo "<h1>Bem vindo <u>$nome</u></h1>";
        echo "<br>";
        echo "<h1>seu e-mail é <u>$logado</u></h1>";
        echo "<br>";
        echo "<h1>seua senha é <u>$senha</u></h1>";
        print_r($_SESSION);
        echo "<br>";
        echo "<br>";
    ?>
    

    <a href="sair.php">sair</a> <a href="index.php">home</a>
</body>

</html>