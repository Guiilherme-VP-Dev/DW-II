<?php
// Leia o arquivo JSON para carregar os dados
$data = json_decode(file_get_contents('dados.json'), true);
$images = $data['images'] ?? [];
$fields = $data['fields'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>PÁGINA INICIAL</title>

    <style>
        /* Estilo do modal */
        .modal {
            display: none; /* Oculto por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fundo escurecido */
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        .modal img {
            width: 100%;
            height: auto;
        }
        .modal p {
            margin-top: 10px;
        }
        .close {
            position: absolute;
            top: 15px;
            right: 30px;
            font-size: 30px;
            cursor: pointer;
        }
        /* Estilo para imagens clicáveis */
        .clickable {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <?php include("include/nav.php"); ?>
    </header>

    <section class="page">
        <div class="quadrado">
            <div class="quadrado-1">
                <?php if (!empty($images) && !empty($fields)): ?>
                    <!-- Exibição da Imagem 1 com descrição -->
                    <div class="text clickable" data-index="0">
                        <img src="<?php echo $images[0]; ?>" alt="Imagem 1" width="230" height="285">
                        <p><?php echo htmlspecialchars($fields[0]); ?></p>
                    </div>
                    <!-- Exibição da Imagem 2 com descrição -->
                    <div class="text clickable" data-index="1">
                        <img src="<?php echo $images[1]; ?>" alt="Imagem 2" width="488" height="185">
                        <p><?php echo htmlspecialchars($fields[1]); ?></p>
                    </div>
                    <!-- Exibição da Imagem 3 -->
                    <div class="text clickable" data-index="2">
                        <img src="<?php echo $images[2]; ?>" alt="Imagem 3" width="515" height="274">
                    </div>
                <?php else: ?>
                    <!-- Se o JSON estiver vazio, imagens padrão são exibidas -->
                    <div class="text clickable" data-index="0">
                        <img src="assets/img/car.jpg" alt="Carro 1" width="230" height="285">
                        <p>Descrição do Carro 1</p>
                    </div>
                    <div class="text clickable" data-index="1">
                        <img src="assets/img/car.jpg" alt="Carro 2" width="488" height="185">
                        <p>Descrição do Carro 2</p>
                    </div>
                    <div class="text clickable" data-index="2">
                        <img src="assets/img/car.jpg" alt="Carro 3" width="515" height="274"> 
                    </div>
                <?php endif; ?>
            </div>
            <div class="quadrado-2">
                <?php if (count($images) > 3): ?>
                    <!-- Exibição das imagens restantes a partir da quarta -->
                    <div class="qua">
                        <div class="text clickable" data-index="3">
                            <img class="menor" src="<?php echo $images[3]; ?>" alt="Imagem 4" width="321" height="152">
                        </div>
                        <div class="text clickable" data-index="4">
                            <img src="<?php echo $images[4]; ?>" alt="Imagem 5" width="590" height="185">
                        </div>
                    </div>
                    <div class="text clickable" data-index="5">
                        <img src="<?php echo $images[5]; ?>" alt="Imagem 6" width="687" height="367">
                    </div>
                <?php else: ?>
                    <!-- Exibição de imagens fixas caso não haja mais imagens no JSON -->
                    <div class="qua">
                        <div class="text clickable" data-index="3">
                            <img class="menor" src="assets/img/car.jpg" alt="Carro 4" width="321" height="152">
                        </div>
                        <div class="text clickable" data-index="4">
                            <img src="assets/img/car.jpg" alt="Carro 5" width="590" height="185">
                        </div>
                    </div>
                    <div class="text clickable" data-index="5">
                        <img src="assets/img/car.jpg" alt="Carro 6" width="687" height="367">        
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="page">
        <div class="center">
            <div class="vem">
                <?php if (count($images) > 5): ?>
                    <!-- Exibe mais imagens do JSON, se houver -->
                    <?php for ($i = 6; $i < min(count($images), 8); $i++): ?>
                        <div class="text clickable" data-index="<?php echo $i; ?>">
                            <img src="<?php echo $images[$i]; ?>" alt="Imagem <?php echo $i+1; ?>" width="687" height="315">
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <!-- Imagens fixas caso JSON tenha menos de 6 imagens -->
                    <div class="text clickable" data-index="6">
                        <img src="assets/img/car.jpg" alt="Carro 7" width="687" height="367">
                    </div>
                    <div class="text clickable" data-index="7">
                        <img src="assets/img/car.jpg" alt="Carro 8" width="687" height="367">
                    </div>
                <?php endif; ?>
            </div>
            <div class="rem">
                <?php if (count($images) > 8): ?>
                    <div class="text clickable" data-index="8">
                        <img src="<?php echo $images[8]; ?>" alt="Imagem 9" width="639" height="654">
                    </div>
                <?php else: ?>
                    <div class="text clickable" data-index="8">
                        <img src="assets/img/car.jpg" alt="Carro 9" width="639" height="654">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="page">
        <div class="cir">
            <?php if (count($images) > 9): ?>
                <div class="text clickable" data-index="9">
                    <img src="<?php echo $images[9]; ?>" alt="Imagem 10">
                </div>
                <?php if (count($images) > 10): ?>
                    <div class="text clickable" data-index="10">
                        <img src="<?php echo $images[10]; ?>" alt="Imagem 11">
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text clickable" data-index="9">
                    <img src="assets/img/eu.jpg" alt="Carro 10">
                </div>
                <div class="text clickable" data-index="10">
                    <img src="assets/img/teta.jpeg" alt="Carro 11">
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Modais para cada imagem -->
    <?php foreach ($images as $index => $image): ?>
    <div id="modal-<?php echo $index; ?>" class="modal">
        <div class="modal-content">
            <span class="close" data-index="<?php echo $index; ?>">&times;</span>
            <img src="<?php echo $image; ?>" alt="Imagem <?php echo $index + 1; ?>">
            <p><?php echo htmlspecialchars($fields[$index]); ?></p>
        </div>
    </div>
    <?php endforeach; ?>

    <script>
        // Função para abrir e fechar modais
        document.querySelectorAll('.clickable').forEach(img => {
            img.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                document.getElementById('modal-' + index).style.display = 'block';
            });
        });

        // Fecha o modal ao clicar no 'X'
        document.querySelectorAll('.close').forEach(closeBtn => {
            closeBtn.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                document.getElementById('modal-' + index).style.display = 'none';
            });
        });

        // Fecha o modal se clicar fora da área do modal
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
    <script src="assets/js/scroll.js"></script>
</body>
</html>
