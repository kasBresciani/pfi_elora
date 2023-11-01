<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
    include_once('../conexao/config.php');
    $email = $_POST['email'];
    $senha = $_POST['pass'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    } else {
        $dados_usuario = mysqli_fetch_assoc($result);

        $_SESSION['id_usuario'] = $dados_usuario['usuarios_id'];
        
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: ../PaginaPrincipal');
    }
} else {
    header('Location: login.php');
}
?>