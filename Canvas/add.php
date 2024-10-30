<?php
// Função para salvar os dados em JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadedFiles = [];
    $fields = $_POST['fields'];

    // Diretório de upload
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
        if (!empty($tmpName)) {
            $fileName = basename($_FILES['files']['name'][$index]);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($tmpName, $filePath);
            $uploadedFiles[] = $filePath;
        }
    }

    // Salva os dados e as imagens em um arquivo JSON
    $data = [
        'fields' => $fields,
        'images' => $uploadedFiles
    ];

    file_put_contents('dados.json', json_encode($data, JSON_PRETTY_PRINT));
    echo "Dados enviados com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Upload de Dados</title>
</head>
<body>
    <header>
        <?php include("include/nav.php"); ?>
    </header>

    <form id="uploadForm" enctype="multipart/form-data" method="post">
        <div class="carousel-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Parcerias Chaves</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Atividades Chave</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Fontes de Receita</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Estrutura de Custo</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Proposta de Valor</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 6 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Segmentos de Clientes</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 7 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Canais</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 8 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Relacionamento com Clientes</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="button" class="button">Proximo</button>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 9 -->
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-content">
                                <label for="">Recursos Chave</label>
                                <input type="text" name="fields[]" placeholder="Digite sua resposta">
                                <input type="file" name="files[]">
                                <button type="submit" class="button">Finalizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 5,
            slidesPerGroup: 1,
            loop: false,
        });

        // Adicionando funcionalidade ao botão "Proximo"
        const buttons = document.querySelectorAll('.button');
        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                swiper.slideNext();
            });
        });
    </script>
</body>
</html>
