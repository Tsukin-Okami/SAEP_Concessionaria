<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAEP Concessionaria</title>
    <link rel="stylesheet" href="source/bootstrap/css/bootstrap.min.css">
    <script src="source/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="source/css/planta.css">
</head>
<body>
    <div class="container p-5 my-5 border">
        <h1 class="h1">SAEP Concessionaria</h1>
    </div>
    <div class="container p-2 my-5 border">
        <div class="planta">
            <?php 
                include "class/model/taghtml.php";
                include "class/model/connection.php";
                include "class/model/automovel.php";
                include "class/model/venda.php";
    
                function createArea(int $number, bool $isAlocado) {
                    if ($isAlocado == true) {
                        $alocado = "alocado";
                    } else {
                        $alocado = "";
                    }
    
                    // <input required>
                    $formInput = new tagHtml;
                    $formInput->setTag("input", true);
                    $formInput->addAtribute("type","hidden");
                    $formInput->addAtribute("name","area");
                    $formInput->addAtribute("value","$number");
    
                    // <button> {number} </button>
                    $formButton = new tagHtml;
                    $formButton->setTag("button");
                    $formButton->setValue("$number");
                    $formButton->addAtribute("class","area-btn");
                    $formButton->addAtribute("type","submit");
    
                    // { <input required><button>{number}</button> }
                    $formInside = $formInput->mount() . $formButton->mount();
    
                    // <form> {value} </form>
                    $formTag = new tagHtml;
                    $formTag->setTag("form");
                    $formTag->addAtribute("class","item$number area $alocado");
                    $formTag->addAtribute("action","venda.php");
                    $formTag->addAtribute("method","get");
                    $formTag->setValue($formInside);
    
                    return $formTag->mount();
                }
    
                $automovel = new Automovel;
                $venda = new Venda;
                
                $planta = "";
    
                for ($i=1; $i < 11; $i++) { 
                    $lista_automoveis = $automovel->getAutomoveisArea($i);
                    $lista_vendas = $venda->getAreaVendas($i);

                    if (is_array($lista_automoveis)) {
                        $lista_automoveis = count($lista_automoveis);
                    } else {
                        $lista_automoveis = 0;
                    }
                    
                    if (is_array($lista_vendas)) {
                        $lista_vendas = count($lista_vendas);
                    } else {
                        $lista_vendas = 0;
                    }

                    $isAlocado = ($lista_automoveis > 0) && ($lista_vendas < $lista_automoveis);
                    $planta .= createArea($i, $isAlocado);
                }
    
                echo $planta;
            ?>
        </div>
    </div>
</body>
</html>