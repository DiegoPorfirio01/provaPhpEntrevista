<?php
class UserColors
{
    public $id;
    public $user_id;
    public $color_id;

    public function __construct()
    {
    }

    //MÉTODOS
    public static function check($color_id, $user_id)
    {
        $connection = new Connection();
        $sql = "SELECT * FROM user_colors WHERE color_id = $color_id AND user_id = $user_id";
        $resultSet = $connection->query($sql);
        $resultado = array();
        $i = 0;
        $totalResultados = count($resultSet);
        for ($j = 0; $j < $totalResultados; $j++) {
            $objeto = new Users();
            foreach ($resultSet[$j] as $chave => $valor) {
                if (!is_int($chave)) {
                    $set = "set" . ucfirst($chave);
                    $objeto->$set($valor);
                }
            }
            $resultado[$i] = $objeto;
            $i++;
        }
        return $resultado;
    }
    public function destroy()
    {
        $sql = "DELETE FROM user_colors WHERE id = ?";
        $bd = new Connection;
        $dados = array(
            array('1' => $this->id)
        );
        $result = $bd->destroy($sql, $dados);
        if ($result == 'ok') {
            return true;
        } else {
            return false;
        }
    }
    public function insert()
    {
        $sql = "
            INSERT INTO user_colors (
                   user_id,
                   color_id
            ) VALUES (
                   ?,?
            )
        ";
        $bd = new Connection;
        $dados = array(
            array(
                '1' => $this->user_id,
                '2' => $this->color_id
            )
        );
        $result = $bd->insertAndReturnId($sql, $dados);
        if ($result > 0) {
            return $result;
        } else {
            return false;
        }
    }
    static function listColorsUser($id)
    {
        $connection = new Connection();
        $sql =
            "SELECT
                 *
              FROM user_colors
             WHERE user_id = $id";
        $resultSet = $connection->query($sql);
        $resultado = array();
        $i = 0;
        $totalResultados = count($resultSet);
        for ($j = 0; $j < $totalResultados; $j++) {
            $objeto = new Users();
            foreach ($resultSet[$j] as $chave => $valor) {
                if (!is_int($chave)) {
                    $set = "set" . ucfirst($chave);
                    $objeto->$set($valor);
                }
            }
            $resultado[$i] = $objeto;
            $i++;
        }
        return $resultado;
    }

    //GETTERS E SETTERS

    //SEM TRATAMENTO DE DADOS
    function __call($method, $params)
    {
        $var = lcfirst(substr($method, 3));
        if (strncasecmp($method, "get", 3) === 0) {
            return $this->$var;
        }
        if (strncasecmp($method, "set", 3) === 0) {
            $this->$var = $params[0];
        }
    }
}
