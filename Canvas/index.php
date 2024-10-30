<?php
session_start();

$id = '';
$senha = '';
$message = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cpf'])) {
        $id = $_POST['cpf'];
    }

    if (isset($_POST['senha'])) {
        $senha = $_POST['senha'];
    }

    // Verificação do ID e senha
    if ($id === "user@gmail.com" && $senha === 'user') {
        // Salva o ID na sessão para uso posterior
        $_SESSION['user_id'] = $id;
        // Redireciona para upload.php após 0.5 segundos
        header('Refresh: 0.5; URL=add.php');
        exit();
    } else {
        if (!empty($id) || !empty($senha)) {
            $message = 'ID ou senha incorretos';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
<body>

<div class="box">
    <span class="borderLine"></span>
    <form action="" method="post"> <!-- A ação do formulário é a própria página -->
        <h2>{Login}</h2>

        <!-- Exibir mensagem de erro se existir -->
        <?php if (!empty($message)): ?>
            <div style="color: red; text-align: center;"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <div class="input-wrapper">
            <input class="input" type="email" name="cpf" id="cpf" placeholder="Email" required="required">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
            </svg>
        </div>
        <div class="input-wrapper">
            <input class="input" type="password" name="senha" id="senha" placeholder="Senha" required="required">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/>
            </svg>
        </div>
        <div class="links">
            <a href="#">Esqueci minha senha</a>
            <a href="">Cadastre-se</a>
        </div>
        <input type="submit" value="Entrar">
    </form>
</div>
</body>
</html>
