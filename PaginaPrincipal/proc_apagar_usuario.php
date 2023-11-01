<?php
session_start();
print_r($_SESSION);

include_once('../conexao/config.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
	$result_usuario = "DELETE FROM categorias WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if (mysqli_affected_rows($conn)) {
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: index.php");
	} else {

		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: index.php");
	}
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: index.php");
}
