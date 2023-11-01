<?php
session_start();
print_r($_SESSION);
print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('Location: login.php');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}

$logado = $_SESSION['email'];
?>