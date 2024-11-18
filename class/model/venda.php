<?php

class Venda
{
    public function getAreaVendas(int $area) {
        try {
            $sql = "SELECT venda.id, venda.automovel_id FROM `venda` LEFT JOIN automovel ON venda.automovel_id=automovel.id WHERE automovel.area_id=?;";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $area);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }

            //echo "no data";
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}