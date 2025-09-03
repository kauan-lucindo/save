<?php
session_start();

session_start();
if (!isset(($_SESSION['email']))) {

    echo "<script>
            alert('Você precissa estar logodo');
            window.location.href = 'accountpage.php';
          </script>";

}

require_once 'php/config.php';

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];

// info enderoco
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

// info metodo de pagamento
$metodo_pagamento = $_POST['pagamento'];

// intens do carrinho
$carrinho_json = $_POST['carrinho_json'];
$carrinho_itens = json_decode($carrinho_json, true);

// valor total do carrinho
$total_compra = $_POST['total_compra'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Confirmada - Your Choice</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="img-your-choice/icon-site-3_resized.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/confirm-sell.css">
</head>

<body>
    <div class="small-container confirmacao-page">
        <!-- <form action=""> -->
        <div class="confirmacao-box">
            <div class="alig-h3">
                <h3>Confirme sua compra</h3>
            </div>
            <div class="aling-resume">
                <div class="detalhes-compra">
                    <div class="destinatario">
                        <p class="title-resume">Destinatario:</p>
                        <p class="item-list">Nome: <span class="item"><?php echo $nome; ?></span></p>
                        <p class="item-list">Email: <span class="item"><?php echo $email; ?></span></p>
                    </div>
                    <div class="seila">
                        <p class="title-resume">Items:</p>
                        <?php foreach ($carrinho_itens as $item): ?>
                            <div class="item">
                                <p class="item-list">Nome: <span class="item"><?php echo $item['nome']; ?></span></p>
                                <p class="item-list">Quantidade: <span
                                        class="item"><?php echo $item['quantidade']; ?></span>
                                </p>
                                <p class="item-list">Total: <span
                                        class="item">R$<?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></span>
                                </p><br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="endereco">
                        <div class="item">
                            <p class="title-resume">Endereço:</p>
                            <p class="item-list">Endereço: <span class="item"><?php echo "$endereco ";
                            echo $numero; ?></span></p>
                            <p class="item-list">CEP: <span class="item"><?php echo $cep; ?></span></p>
                            <p class="item-list">Cidade: <span class="item"><?php echo $cidade; ?></span></p>
                        </div>
                    </div>
                    <div class="metodo-p">
                        <p class="title-resume">Detalhe do pagamento:</p>
                        <p class="item-list">Metodo de pagamento: <span
                                class="item"><?php echo "$metodo_pagamento"; ?></span></p>
                    </div>
                </div>
            </div>
            <div class="acoes">
                <a href="resume-sell.php" class="btn-inicio">Voltar ao resumo</a>
                <a href="sucess-sell.php"><button id="btn-continuar" name="confirmar_compra"
                        class="btn-continuar">Confirmar Compra</button></a>
            </div>
        </div>
        <!-- </form> -->
    </div>


</body>

</html>