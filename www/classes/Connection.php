<?php

class Connection
{
    public $connection;

    public function __construct()
    {
        $host = "db";
        $username = "root";
        $password = "root";
        $db = "teste";

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function alter($query, $dados)
    {
        try {
            $banco = $this->getConnection();
            $statement = $banco->prepare($query);
            for ($i = 0; $i < count($dados); $i++) {
                foreach ($dados[$i] as $chave => $valor) {
                    $statement->bindValue($chave, $valor);
                }
            }
            $statement->execute();
            if (count($dados[0]) > 10) {
                //printR($dados[0]); die();
            }
            $erro = $statement->errorInfo();
            if ($erro[2]) {
                echo "\n<!-- " . printR($erro) . " -->\n";
                die();
            }
            return "ok";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function query($query)
    {
        try {
            $banco = $this->getConnection();

            $resultado = $banco->prepare($query);
            if (!$resultado->execute()) {
                $erro = $resultado->errorInfo();
                if ($erro[2]) {
                    print_r($erro[2]);
                }
            }
            $linhas = $resultado->fetchAll();
            return $linhas;
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
    public function destroy($query, $dados)
    {
        try {
            $banco = $this->getConnection();
            $statement = $banco->prepare($query);
            for ($i = 0; $i < count($dados); $i++) {
                foreach ($dados[$i] as $chave => $valor) {
                    $statement->bindValue($chave, $valor);
                }
                $statement->execute();
                if (!$statement->execute()) {
                    $erro = $statement->errorInfo();
                    if ($erro[2]) {
                        printR($erro);
                        throw new Exception($erro[2]);
                    }
                }
            }
            return "ok";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function insert($query, $dados)
    {
        try {
            $banco = $this->getConnection();
            $statement = $banco->prepare($query);
            for ($i = 0; $i < count($dados); $i++) {
                foreach ($dados[$i] as $chave => $valor) {
                    $statement->bindValue($chave, $valor);
                }
            }
            $statement->execute();
            if (count($dados[0]) > 10) {
                //printR($dados[0]); die();
            }
            $erro = $statement->errorInfo();
            if ($erro[2]) {
                echo "\n<!-- " . printR($erro) . " -->\n";
                die();
            }
            return "ok";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function insertAndReturnId($query, $dados)
    {
        try {
            $banco = $this->getConnection();
            $statement = $banco->prepare($query);
            for ($i = 0; $i < count($dados); $i++) {
                foreach ($dados[$i] as $chave => $valor) {
                    $statement->bindValue($chave, $valor);
                }
            }
            //			var_dump($statement);
            $statement->execute();
            if (count($dados[0]) > 10) {
                //printR($dados[0]);
                //die();
            }
            $erro = $statement->errorInfo();
            if ($erro[2]) {
                printR($erro);
                throw new Exception("Erro ao efetuar consulta");
            }
            return $banco->lastInsertId();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
