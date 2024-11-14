<?php

class Automovel
{
    public function getAutomovelId($id)
    {
        try {
            $sql = "SELECT * FROM automovel WHERE id=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $id);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }

            //echo "Sem dados";
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            return false;
        }
    }

    public function getAutomovelNome($nome)
    {
        try {
            $sql = "SELECT * FROM automovel WHERE nome=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $nome);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }

            //echo "Sem dados";
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            return false;
        }
    }

    public function getAutomoveisArea($area_id)
    {
        try {
            $sql = "SELECT * FROM automovel WHERE area_id=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $area_id);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }

            //echo "Sem dados";
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            return false;
        }
    }

    public function getAutomoveisConcessionaria($concessionaria)
    {
        try {
            $sql = "SELECT * FROM automovel WHERE concessionaria_id=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $concessionaria);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }

            //echo "Sem dados";
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
            return false;
        }
    }

    public function venderAutomovel($automovel_id, $cliente_id)
    {
        try {
            $sql = "INSERT INTO venda(cliente_id, automovel_id, preco) VALUES (:cliente, :automovel, :preco)";
            $stmt = Connection::getConnection()->prepare($sql);

            $auto = $this->getAutomovelId($automovel_id);
            
            $stmt->bindValue("cliente", $cliente_id);
            $stmt->bindValue("automovel", $automovel_id);
            $stmt->bindValue("preco", $auto["preco"]);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                //echo "Automovel vendido";
            }

            return true;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                //echo "Veiculo já vendido";
            } else {
                echo $e->getMessage() . "<br>";
            }
            return false;
        }
    }
}