<?php

include "./connection.php";
include "./automovel.php";

$auto = new Automovel;

//$r = $auto->getAutomovelId(1);
//$r = $auto->venderAutomovel(1,1);
$r = $auto->getAutomovelArea(1);

print_r($r);