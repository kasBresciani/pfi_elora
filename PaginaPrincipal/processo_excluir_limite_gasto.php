<?php
session_start();


include_once('../conexao/config.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
	$result_usuario = "DELETE FROM limites_gastos WHERE id='$id'";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	if (mysqli_affected_rows($conexao)) {
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
