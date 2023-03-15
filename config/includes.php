<?php 
$caminho = null;
if (is_file("../../../config/includes.php")) {
    $caminho = "../../../";
} elseif (is_file("../../config/includes.php")) {
    $caminho = "../../";
} elseif (is_file("../config/includes.php")) {
    $caminho = "../";
} elseif (is_file("config/includes.php")) {
    $caminho = "";
}
require_once $caminho.'connection.php';
require_once $caminho.'classes\Colors.php';
require_once $caminho.'classes\Users.php';
require_once $caminho.'classes\UsersColors.php';
