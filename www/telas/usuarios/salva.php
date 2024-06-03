<?php
require_once '../../config/includes.php';
if (
    $_POST['name'] == ''
    or $_POST['email'] == ''
) {
    $_SESSION['message'] = "Campo(s) obrigatório(s):";
    if ($_POST['name'] == '') {
        $_SESSION['message'] .= '<br/><div class="alert alert-danger">O nome esta vazio !</div>';
    }
    if ($_POST['email'] == '') {
        $_SESSION['message'] .= '<br/><div class="alert alert-danger">O Email esta vazio !</div>';
    }
    header('Location: cria.php');
}
$user = new Users();
$user->setName($_POST['name']);
$user->setEmail($_POST['email']);

//verificações
if ($user->selectEmail()) {
    $_SESSION['message'] = "<div class='alert alert-danger'>O Email " .  $user->getEmail() . " Já Foi Cadastrado  !</div>";
    header('Location: cria.php');
    die();
}

if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "<div class='alert alert-danger'>O Email " .  $user->getEmail() . " Não é um Email Valido  !</div>";
    header('Location: cria.php');
    die();
}


$insert = $user->insert();
if ($insert > 0) {
    $resultado = Colors::listColors();
    foreach ($resultado as $chave => $valor) {
        if (isset($_POST['color' . $valor->getId()])) {
            $userColors = new UserColors();
            $userColors->setUser_id($insert);
            $userColors->setColor_id($valor->getId());
            $userColors->insert();
        }
    }
    // Exibir mensagem de sucesso
    $_SESSION['message'] = '<div class="alert alert-success">Usuário criado com sucesso!</div>';
    header('Location: ../../');
}
