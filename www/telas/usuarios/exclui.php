<?php
include_once('../../config/includes.php');
$id = $_GET['id'];
$users = new Users;
$users->setId($id);
$users->destroy();
$userColors = new UserColors;
$resultado = UserColors::listColorsUser($id);
foreach ($resultado as $chave => $valor) {
    $userColors->setId($valor->getId());
    $userColors->destroy();
}
$_SESSION['message'] = '<div class="alert alert-success" role="alert">Usuário excluído com sucesso!</div>';
header('Location: ../../');
