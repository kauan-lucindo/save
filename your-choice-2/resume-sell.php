<?php
session_start();
if (!isset(($_SESSION['email']))) {

    echo "<script>
            alert('Você precissa estar logodo');
            window.location.href = 'accountpage.php';
          </script>";

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo da compra - Your Choice</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="img-your-choice/icon-site-3_resized.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/resume-sell.css">

</head>

<body>

    <div class="small-container confirmacao-page">
        <div class="confirmacao-box">

            <div class="detalhes-compra">
                <h3>Resumo do Pedido:</h3>
                <div id="resumo-pedido">
                    <!-- JavaScript vai preencher aqui -->
                </div>
                <p class="total">Total: <span id="total-compra">R$ 0,00</span></p>
            </div>

            <form id="form-pay" method="POST" action="confirm-sell.php">
                <input type="hidden" name="carrinho_json" id="carrinho_json">
                <input type="hidden" name="total_compra" id="total-compra-hidden">
                <div class="align-cep">
                    <div class="box-inputs">
                        <div class="endereco-box-inputs">



                            <div class="title-cep-pay">
                                <h3>Insira o destinatário</h3>
                            </div>
                            <div class="form-input">
                                <input class="input-float" placeholder="" type="text" id="cep" name="cep" required>
                                <label class="label-float" for="cep">CEP</label>
                            </div>
                            <div class="form-input">
                                <input class="input-float" placeholder="" type="text" id="numero" name="numero"
                                    required>
                                <label class="label-float" for="numero">Numero</label>
                            </div>
                            <div class="form-input">
                                <input class="input-float" placeholder="" type="text" id="endereco" name="endereco">
                                <label class="label-float" for="endereco">Endereço</label>
                            </div>
                            <div class="form-input">
                                <input class="input-float" placeholder="" type="text" id="bairro" name="bairro">
                                <label class="label-float" for="bairro">Bairro</label>
                            </div>
                            <div class="form-input">
                                <input class="input-float" placeholder="" type="text" id="cidade" name="cidade">
                                <label class="label-float" for="cidade">Cidade</label>
                            </div>
                            <div class="form-input">
                                <input class="input-float" placeholder="" type="text" id="estado" name="estado">
                                <label class="label-float" for="estado">Estado</label>
                            </div>
                            <div class="align-erros">
                                <div id="erros">
                                    <div class="erro1">
                                        <span id="erroSenhaConfirm">Erro: Cep invalido</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-cep-pay">
                            <h3>Escolha a forma de pagamento</h3>
                        </div>
                        <div class="pay-form">
                            <div class="pay-option" data-metodo="Cartção de credito">
                                <div class="pay-icon"><i class="far fa-credit-card"></i></div>
                                <div class="pay-text">
                                    <div class="pay-title">Cartão de credito</div>
                                    <div class="pay-description">Page parceldado</div>
                                </div>
                            </div>
                            <div class="pay-option" data-metodo="Pix">
                                <div class="pay-icon"><i class="fas fa-qrcode"></i></div>
                                <div class="pay-tex">
                                    <div class="pay-title">Pix</div>
                                    <div class="pay-description">Pagamento instantâneo</div>
                                </div>
                            </div>
                            <div class="pay-option" data-metodo="Boleto">
                                <div class="pay-icon"><i class="fas fa-barcode"></i></div>
                                <div class="pay-tex">
                                    <div class="pay-title">Boleto</div>
                                    <div class="pay-description">Pague em ate 3 dias </div>
                                </div>
                            </div>
                            <div class="pay-option" data-metodo="Cartão de debito">
                                <div class="pay-icon"><i class="fas fa-credit-card"></i></div>
                                <div class="pay-tex">
                                    <div class="pay-title">Cartão de debito</div>
                                    <div class="pay-description"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <input type="hidden" name="pagamento" id="pagamento">
                <div class="acoes">
                    <a href="cart.php" class="btn-inicio">Voltar ao carrinho</a>
                    <button id="btn-continuar" class="btn-continuar">Confirmar Compra</button>
                </div>

        </div>
    </div>
    </form>

    <script>
        // Mostra os itens do carrinho na confirmação
        function mostrarResumoCompra() {
            const carrinhoSalvo = localStorage.getItem('carrinho');
            const resumoElement = document.getElementById('resumo-pedido');
            const totalElement = document.getElementById('total-compra');

            if (carrinhoSalvo) {
                const carrinhoItens = JSON.parse(carrinhoSalvo);
                let total = 0;
                let html = '';

                carrinhoItens.forEach(item => {
                    const itemTotal = item.preco * item.quantidade;
                    total += itemTotal;

                    html += `
                        <div class="item-pedido">
                            <span class="item-nome">${item.quantidade}x ${item.nome}</span>
                            <span class="item-preco">R$ ${itemTotal.toFixed(2)}</span>
                        </div>
                    `;
                });

                resumoElement.innerHTML = html;
                totalElement.textContent = `R$ ${total.toFixed(2)}`;

                // Limpa o carrinho após a compra
                // localStorage.removeItem('carrinho');
                // localStorage.removeItem('totalItensCarrinho');
            } else {
                resumoElement.innerHTML = '<p>Nenhum item no pedido</p>';
            }
        }

        // Quando a página carrega
        window.addEventListener('load', function () {
            mostrarResumoCompra();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paymentOptions = document.querySelectorAll('.pay-option');
            const inputPagamento = document.getElementById('pagamento');
            const form = document.querySelector('#form-pay');

            paymentOptions.forEach(option => {
                option.addEventListener('click', function () {
                    const metodo = option.getAttribute('data-metodo');

                    // Remove selected class from all options
                    paymentOptions.forEach(opt => opt.classList.remove('selected'));

                    // Add selected class to clicked option
                    option.classList.add('selected');

                    inputPagamento.value = metodo;

                    // console.log("voce selecionou", metodo);

                });
            });


            form.addEventListener("submit", function (e) {
                if (inputPagamento.value === "") {
                    e.preventDefault();
                    alert("⚠️ Selecione um método de pagamento antes de continuar!");
                }

                const carrinhoSalvo = localStorage.getItem('carrinho')
                if (carrinhoSalvo) {

                    document.getElementById('carrinho_json').value = carrinhoSalvo;

                    const carrinhoItens = JSON.parse(carrinhoSalvo);
                    let total = 0;

                    carrinhoItens.forEach(item => {
                        total += item.preco * item.quantidade
                    });

                    document.getElementById('total-compra-hidden').value = total.toFixed(2);
                } else {
                    e.preventDefault();
                    alert("seu carrinho esta vazio")
                }
            });
        });


    </script>

    <script src="js/cep.js"></script>
</body>



</html>