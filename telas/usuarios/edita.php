<link rel="stylesheet" href="../../assets/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/style.css">
<?php
require_once '../../config/includes.php';
$user = new Users();
$user->setId($_GET['id']);
$user->select();
?>
<div class="container mt-5">
    <div class="panel panel-default">
        <div class="panel-body m-5 text-center">
            <h3>Editar Usuário</h3>
        </div>
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
            echo $_SESSION['message'];
            $_SESSION['message'] = '';
        }
        ?>
        <div class="panel-body">
            <form action="altera.php" method="post">
                <input type="hidden" name="id" value="<?= $user->getId() ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nome">Usuário</label>
                        <input type="text" class="form-control" name="name" value="<?= $user->getName() ?>" maxlength="100" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" value="<?= $user->getEmail() ?>" maxlength="100" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <div class="form-check">
                            <?php
                            $colorUser = UserColors::listColorsUser($user->getId());
                            $color = new Colors();
                            $resultado = $color->listColors();
                            foreach ($resultado as $chave => $valor) { ?>
                                <label class="form-check d-inline-block"><?= $valor->getName() ?></label>
                                <div class="input-colors" style="background-color:<?= $valor->getName() ?>;"></div>
                                <input class="form-check d-inline-block" type="checkbox" name="color<?= $valor->getId() ?>" <?php if (in_array($valor->getId(), array_column($colorUser, 'color_id'))) { ?> checked<?php } ?>>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center mt-5">
                        <button type="submit" class="btn btn-primary botoes">Atualizar</button>
                        <a href="../../"><button type="button" class="btn btn-warning botoes">Voltar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>