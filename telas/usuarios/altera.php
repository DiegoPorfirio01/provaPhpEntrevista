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
     header("Location: edita.php?id=".$_POST['id']."");
}
$user = new Users();
$user->setId($_POST['id']);
$user->setName($_POST['name']);
$user->setEmail($_POST['email']);

//verificações
if ($user->selectEmail()) {
    $_SESSION['message'] = "<div class='alert alert-danger'>O Email " .  $user->getEmail() . " Já Foi Cadastrado  !</div>";
     header("Location: edita.php?id=".$_POST['id']."");
    die();
}

if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "<div class='alert alert-danger'>O Email " .  $user->getEmail() . " Não é um Email Válido  !</div>";
     header("Location: edita.php?id=".$_POST['id']."");
    die();
}

if ($user->alter() > 0) {
    $resultado = Colors::listColors();
    $resultado2 = Colors::listUserColors($user->getId());
    foreach ($resultado as $chave => $valor) {
        if (isset($_POST['color' . $valor->getId()]) && !in_array($valor->getId(), $resultado2)) {
            //verifica se o dado já existe na tabela
            $check = UserColors::check($valor->getId(), $_POST['id']);
            if(empty($check)) {
                //apenas insere se o dado não existir
                $userColors = new UserColors();
                $userColors->setUser_id($_POST['id']);
                $userColors->setColor_id($valor->getId());
                $userColors->insert();
            }
        } else {
            $userColors = new UserColors();
            $userColors->setId($valor->getIdUserColor());
            $userColors->destroy();
        }
    } 
    // Exibir mensagem de sucesso
    $_SESSION['message'] = '<div class="alert alert-success">Usuário Atualizado com Sucesso!</div>';
    header('Location: ../../');
} else {
    $_SESSION['message'] = "<div class='alert alert-danger'>Erro ao alterar usuário!</div>";
    header("Location: edita.php?id=".$_POST['id']."");
}
