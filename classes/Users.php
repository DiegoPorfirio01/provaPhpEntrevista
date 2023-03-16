<?php
class Users
{
    public $id;
    public $email;
    public $name;
    public function __construct()
    {
    }

    //MÉTODOS
    public function alter()
    {
        $sql = "
            UPDATE users
               SET name = ?,
                   email = ?
             WHERE id = ?
        ";
        $bd = new Connection;
        $dados = array(
            array(
                '1' => $this->name,
                '2' => $this->email,
                '3' => $this->id
            )
        );
        $result = $bd->alter($sql, $dados);
        if ($result == 'ok') {
            return true;
        } else {
            return false;
        }
    }
    public function destroy()
    {
        $sql = "DELETE FROM users WHERE id = ?";
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
            INSERT INTO users (
                   name,
                   email
            ) VALUES (
                   ?,?
            )
        ";
        $bd = new Connection;
        $dados = array(
            array(
                '1' => $this->name,
                '2' => $this->email
            )
        );
        $result = $bd->insertAndReturnId($sql, $dados);
        if ($result > 0) {
            return $result;
        } else {
            return false;
        }
    }
    function listUsers()
    {
        $connection = new Connection();
        $sql =
            "
            SELECT
                us.id,
                us.name,
                us.email,
                (
                SELECT
                     GROUP_CONCAT(col.name)
                     FROM colors AS col
               LEFT JOIN user_colors AS uc
                      ON col.id = uc.color_id
                   WHERE uc.user_id = us.id
                ) AS cor
            FROM
                users AS us;
           ";
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
    public function selectEmail()
    {
        $bd = new Connection;
        $sql = "
            SELECT email
              FROM users
             WHERE email = '$this->email'
               AND id != '$this->id'
               AND email IS NOT NULL
        ";
        $resultado = $bd->query($sql);
        if (count($resultado) == 1) {
            foreach ($resultado[0] as $chave => $valor) {
                if (!is_int($chave)) {
                    $this->$chave = $valor;
                }
            }
            return true;
        } else {
            return false;
        }
    }
    public function select()
    {
        $bd = new Connection;
        $sql = "
            SELECT *
              FROM Users
             WHERE id = '$this->id'
        ";
        $resultado = $bd->query($sql);
        if (count($resultado) == 1) {
            foreach ($resultado[0] as $chave => $valor) {
                if (!is_int($chave)) {
                    $this->$chave = $valor;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    //GETTERS E SETTERS

    // SEM TRATAMENTO DE DADOS
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

    // COM TRATAMENTO DE DADOS
    public function getName()
    {
        return nomeProprio($this->name);
    }
    public function setName($name)
    {
        $this->name = nomeProprio($name);
    }
}
