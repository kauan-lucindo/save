<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada com Sucesso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/sucess-sell.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Compra Realizada com Sucesso!</h1>
        <p>Obrigado por sua compra. Seu pedido foi processado e em breve você receberá uma confirmação por e-mail.</p>
        <div style="margin-top: 30px;">
            <a href="index.php" class="btn">Continuar Comprando</a>
        </div>
    </div>
    
    <script>
        // Adiciona um efeito de confetti simples após o carregamento da página
        document.addEventListener('DOMContentLoaded', function() {
            const colors = ['#b84ae4'];
            const container = document.querySelector('.container');
            
            for (let i = 0; i < 30; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.innerHTML = '✔';
                    confetti.style.position = 'fixed';
                    confetti.style.color = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.fontSize = Math.random() * 20 + 10 + 'px';
                    confetti.style.top = Math.random() * 100 + 'vh';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.opacity = '0';
                    confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                    confetti.style.zIndex = '-1';
                    document.body.appendChild(confetti);
                    
                    // Animação
                    setTimeout(() => {
                        confetti.style.transition = 'all 1s ease';
                        confetti.style.opacity = '0.7';
                        confetti.style.top = parseFloat(confetti.style.top) - 40 + 'px';
                    }, 10);
                    
                    // Remover após animação
                    setTimeout(() => {
                        confetti.style.opacity = '0';
                    }, 1000);
                    
                    // Remover do DOM após animação
                    setTimeout(() => {
                        document.body.removeChild(confetti);
                    }, 2000);
                }, i * 100);
            }
        });
    </script>
</body>
</html>