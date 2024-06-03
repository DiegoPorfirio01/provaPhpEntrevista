<link rel="stylesheet" href="../../assets/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/style.css">
<?php
require_once '../../config/includes.php';
?>
<div class="container mt-5">
    <div class="panel panel-default">
        <div class="panel-body m-5 text-center">
            <h3>Criar Usuário</h3>
        </div>
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
            echo $_SESSION['message'];
            $_SESSION['message'] = '';
        }
        ?>
        <div class="panel-body">
            <form action="salva.php" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nome">Usuário</label>
                        <input type="text" class="form-control" name="name" maxlength="100" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" maxlength="100" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <div class="form-check">
                            <?php
                            $cores = new Colors();
                            $resultado = $cores->listColors();
                            foreach ($resultado as $chave => $valor) { ?>
                                <label class="form-check d-inline-block"></label><?= $valor->getName() ?></label>
                                <div class="input-colors" style="background-color:<?= $valor->getName() ?>;"></div>
                                <input class="form-check d-inline-block" type="checkbox" name="color<?= $valor->getId() ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center mt-5">
                        <button type="submit" class="btn btn-primary botoes">Salvar</button>
                        <a href="../../"><button type="button" class="btn btn-warning botoes">Voltar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
