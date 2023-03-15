<link rel="stylesheet" href="../../assets/bootstrap.min.css">
<?php require_once '../../config/includes.php' ?>

<div class="container mt-5">
    <div class="panel panel-default">
        <div class="panel-body m-5 text-center">
            <h3>Criar Usuário</h3>
        </div>
        <form action="../salva.php" method="post">
            <div class="row ">
                <div class="form-group col-sm-12">
                    <label for=""> Usuário </label>
                    <input type="text" class="form-control" name="nome" maxlength="150" required >
                </div>
                <div class="form-group col-sm-12">
                <label for=""> E-MAIL </label>
                    <input type="text" class="form-control" name="nome" maxlength="150" required >
                </div>
                <div class="form-group col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Azul
                        </label>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-primary btn-block" type="submit">Criar Usuário</button>
                </div>
            </div>
        </form>
    </div>
</div>
