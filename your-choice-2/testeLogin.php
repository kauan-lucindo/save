<?php
session_start();


if (isset($_POST['submitLogin'])) {
    // entrou

    include_once('php/config.php');

    $emailLogin = $_POST['emailLogin'];
    $senhaLogin = $_POST['senhaLogin'];



    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->execute([$emailLogin, $senhaLogin]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {

        $_SESSION['email'] = $emailLogin;
        $_SESSION['senha'] = $senhaLogin;
        $_SESSION['nome'] = $usuario['usuario'];
        
        header("Location: index.php");

    } else {

        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);

        echo "<script>
            alert('Email ou senha invalido');
            window.location.href = 'accountpage.php';
          </script>";
    }

} else {
    // nao entrou

    header("Location: accountpage.php");
}

?>