<?php

class Cliente
{
    public function getClientes() {
        try {
            $sql = "SELECT * FROM cliente";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }

            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}