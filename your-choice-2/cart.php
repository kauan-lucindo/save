<?php
session_start();
include 'php/config.php';

function usuarioLogado()
{
    return isset($_SESSION["email"]);
}

if (isset($_SESSION["email"])) {

} else

    $usuarioLogado = usuarioLogado();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu carrinho - Your Choice</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="img-your-choice/icon-site-3_resized.ico" type="image/x-icon">
    <link rel="stylesheet" href="media.css/media-cart.css">
    <script async src="js/cart.js"></script>

<body>
    <div class="container">
        <div class="navbar">
            <a href="index.php">
                <div class="logo">
                    <a href="index.php"><img id="logo-navbar" src="img-your-choice/logo_your_choice_sf.png"
                            width="125px"></a>
                </div>
            </a>
            <nav>
                <ul id="MenuItems">
                    <li><a id="home" href="index.php">Home</a></li>
                    <li><a id="product-navbar" href="products.html">Produtos</a></li>
                    <li><a id="about" href="about-us.html">Sobre nós</a></li>
                    <li><a id="contact" href="contact.html">Contato</a></li>
                    <!-- <li><a id="acount" href="accountpage.php">Conta</a></li> -->
                </ul>
            </nav>
            <img src="img-your-choice/menu.png" class="menu-icon" onclick="menutoggle()">
            <a href="cart.php"><img class="cart" src="img-your-choice/cart.png" width="30px" height="30px"></a>
        </div>
    </div>

    <!---------------------------cart items details--------------->
    <div class="small-container cart-page">

        <table class="table-cart">
            <tr>
                <th>Produtos</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>

            <tbody id="lista-carrinho">
                <!-- JavaScript vai preencher aqui -->
            </tbody>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td class="subtotal">R$0,00</td>
                </tr>
                <tr>
                    <td>Frete</td>
                    <td>R$0,00</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td class="total-p">R$0,00</td>
                </tr>
            </table>
        </div>

        <div class="box-align2">
            <div class="box-align">
                <div class="btn-delete-cart-box">
                    <button onclick="limparCarrinho()" class="btn-delete">limpar carrinho</button>
                </div>
                <div class="btn-comprar-cart-box">
                    <?php if (usuarioLogado()): ?>
                        <button class="btn-delete" onclick="finalizarCompra()">Comprar</button>
                    <?php else: ?>
                        <button class="btn-login-cart" onclick="redirecionarLogin()">comprar</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>



        <!--------------------------------------footer---------------------------->

        <div class="footer">
            <div class="container">
                <div class="row">

                    <div class="footer-col-2">
                        <img class="logo-footer" src="img-your-choice/logo_your_choice_sf.png">
                        <p class="media-p">Sua experiência de <strong>personalização</strong> de um jeito nunca antes
                            visto.
                        </p>
                    </div>


                    <div class="footer-col-3">
                        <h3>Nos siga</h3>
                        <ul>
                            <a class="rediricionamento" href="">
                                <li>Whatsapp</li>
                            </a>
                            <a class="rediricionamento" target="_blank"
                                href="https://www.instagram.com/_yourchoicestore/">
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

        <!-------------------------SISTEMA DE CARRINHO------------------->
        <script>


            let carrinhoItens = [];

            // Função para carregar o carrinho do localStorage
            function carregarCarrinho() {
                const carrinhoSalvo = localStorage.getItem('carrinho');
                if (carrinhoSalvo) {
                    carrinhoItens = JSON.parse(carrinhoSalvo);
                    atualizarCarrinho();
                }
            }

            // Função para atualizar a visualização do carrinho
            function atualizarCarrinho() {
                const listaCarrinho = document.getElementById('lista-carrinho');
                const subtotalElement = document.querySelector('.subtotal');
                const totalElement = document.querySelector('.total-p');

                if (!listaCarrinho) return;

                // Limpa a lista
                listaCarrinho.innerHTML = '';

                // Verifica se o carrinho está vazio ANTES de tentar processar os itens
                if (carrinhoItens.length === 0) {
                    listaCarrinho.innerHTML = `
            <tr>
                <td colspan="3" style="text-align: center; padding: 20px;">
                    Seu carrinho está vazio. <a href="products.html">Continue comprando</a>
                </td>
            </tr>
        `;

                    // Atualiza os totais para zero
                    if (subtotalElement) subtotalElement.textContent = 'R$ 0,00';
                    if (totalElement) totalElement.textContent = 'R$ 0,00';

                    return;
                }

                let subtotal = 0;

                // Adiciona cada item à lista (só executa se o carrinho não estiver vazio)
                carrinhoItens.forEach((item, index) => {
                    const itemTotal = item.preco * item.quantidade;
                    subtotal += itemTotal;

                    const tr = document.createElement('tr');
                    tr.className = 'cart-product';
                    tr.innerHTML = `
            <td>        
                    <div class="cart-info">
                        <a href="${item.url}">
                            <img src="${item.imagem}" alt="${item.nome}">
                        </a>
                        <div>
                            <a href="${item.url}">
                                <p>${item.nome}</p>
                            </a>
                            <small>Tamanho: ${item.tamanho}</small>
                            <a class="btn-product-remove" onclick="removerDoCarrinho('${item.idUnico}')">Remover</a>
                        </div>
                </div>
            </td>
            <td>
                <input onblur="validarNumero()" style="width:100px; border:1px solid #a12eed;" class="products-qtd" type="number" min="1" value="${item.quantidade}"
            onchange="atualizarQuantidade(${index}, this.value)">
            </td>
            <td>
                <span class="pruduct-price">R$ ${(item.preco * item.quantidade).toFixed(2)}</span>
            </td>
        `;
                    listaCarrinho.appendChild(tr);
                });

                // Atualiza os totais
                if (subtotalElement) {
                    subtotalElement.textContent = `R$ ${subtotal.toFixed(2)}`;
                }
                if (totalElement) {
                    totalElement.textContent = `R$ ${subtotal.toFixed(2)}`;
                }
            }

            // Função para remover item do carrinho
            function removerDoCarrinho(idUnico) {
                const index = carrinhoItens.findIndex(item => item.idUnico === idUnico);

                if (index !== -1) {
                    if (confirm('Tem certeza que deseja remover este item?')) {
                        carrinhoItens.splice(index, 1);
                        salvarCarrinho();
                        atualizarCarrinho();
                    }
                }
            }

            // Função para atualizar quantidade
            function atualizarQuantidade(index, novaQuantidade) {
                novaQuantidade = parseInt(novaQuantidade);
                if (novaQuantidade < 1) novaQuantidade = 1;

                carrinhoItens[index].quantidade = novaQuantidade;
                salvarCarrinho();
                atualizarCarrinho();
            }

            // Função para salvar no localStorage
            function salvarCarrinho() {
                localStorage.setItem('carrinho', JSON.stringify(carrinhoItens));
            }

            // Função para finalizar compra
            function finalizarCompra() {
                if (carrinhoItens.length === 0) {
                    alert('Seu carrinho está vazio!');
                    return; // Isso para a execução da função
                }

                // Só redireciona se o carrinho NÃO estiver vazio
                window.location.href = 'resume-sell.php';
            }

            function redirecionarLogin() {

                alert('para comprar pracisa estar logado')
                window.location.href = 'accountpage.php'

            }

            // Função para limpar o carrinho
            function limparCarrinho() {
                carrinhoItens = [];
                salvarCarrinho();
                atualizarCarrinho();
            }

            // Carrega o carrinho quando a página abre
            window.addEventListener('load', function () {
                carregarCarrinho();

                // // Adiciona evento ao botão comprar
                // const btnComprar = document.querySelector('.btn-comprar');
                // if (btnComprar) {
                //     btnComprar.addEventListener('click', finalizarCompra);
                // }
            });

            function validarNumero() {
                const input = document.querySelector('.products-qtd');
                if (input.value === '') {
                    alert('Este campo não pode ficar vazio!');
                    input.value = '1';

                    // Disparar evento de change para que outros listeners sejam notificados
                    const event = new Event('change', { bubbles: true });
                    input.dispatchEvent(event);
                }
            }

            // Adicionar listener para o evento change
            document.querySelector('.products-qtd').addEventListener('change', function () {
                if (typeof atualizarCarrinho === 'function') {
                    atualizarCarrinho();
                }
            });
        </script>

</body>

</html>