<?php 
function nomeProprio($nome, $minimo = 3)
{
    $nome = strtolower($nome);
    $nome = explode(' ', $nome);
    for ($i = 0; $i < count($nome); $i++) {
        if (strlen($nome[$i]) < $minimo) {
            continue;
        }
        $nome[$i] =  ucfirst($nome[$i]);
    }
    $nome = implode(' ', $nome);
    return $nome;
}
function ola()
{
    $hora = date('H');
    if ($hora < 12) {
        $ola = "Bom dia";
    } elseif ($hora < 18) {
        $ola = "Boa tarde";
    } else {
        $ola = "Boa noite";
    }
    return $ola;
}
function printR($dado)
{
    echo "<pre>";
    print_r($dado);
    echo "</pre>";
}
