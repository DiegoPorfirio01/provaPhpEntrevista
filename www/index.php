<?php
require_once 'config/includes.php';
?>
<link rel="stylesheet" href="assets/bootstrap.min.css">
<link rel="stylesheet" href="assets/style.css">
<div class="container mt-5 text-center">
    <h4 class="ola"><?= ola() ?></h4>
    <div class="panel panel-default">
        <div class="panel-body m-5">
            <a href='telas/usuarios/cria.php'><button class="btn btn-primary botoes" type="button">Criar</button></a>
        </div>
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
            echo $_SESSION['message'];
            $_SESSION['message'] = '';
        }
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cores</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = new Users();
                $resultado = $users->listUsers();
                if (empty($resultado)) {
                    echo "<tr><td colspan='5' class='text-center'>Nenhum registro encontrado.</td></tr>";
                } else {
                    foreach ($resultado as $chave => $valor) { ?>
                        <tr>
                            <td><?= $valor->getId(); ?></td>
                            <td><?= $valor->getName(); ?></td>
                            <td><?= $valor->getEmail(); ?></td>
                            <td><?= $valor->getCor() == '' ? 'Sem Cor' : $valor->getCor(); ?></td>
                            <td>
                                <a href="/telas/usuarios/edita.php?id=<?= $valor->getId() ?>" class="btn btn-warning botoes">Editar</a>
                                <a href="/telas/usuarios/exclui.php?id=<?= $valor->getId() ?>" class="btn btn-danger botoes">Excluir</a>
                            </td>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
