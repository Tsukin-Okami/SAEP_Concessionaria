<?php

include "./connection.php";
//include "./automovel.php";
include "./venda.php";

$venda = new Venda;

//$r = $auto->getAutomovelId(1);
//$r = $auto->venderAutomovel(1,1);
//$r = $auto->getAutomoveisArea(1);
$r = $venda->getAreaVendas(1);

print_r($r);