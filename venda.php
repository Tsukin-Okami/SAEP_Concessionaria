<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Automoveis</title>
    <link rel="stylesheet" href="source/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php
        if (!isset($_GET)) {
            header("Location:./");
        }

        include "class/model/taghtml.php";
        include "class/model/connection.php";
        include "class/model/automovel.php";
        include "class/model/cliente.php";
        include "class/model/venda.php";

        $alert = null;
        function SetAlert(string $type, string $message) {
            $newTag = new tagHtml;
            $newTag->setTag("div");
            $newTag->addAtribute("class","alert alert-$type");
            $newTag->setValue($message);
            
            global $alert;
            $alert = $newTag->mount();
        }
        
        $automovel = new Automovel;
        $venda = new Venda;
        
        $lista_automovel = $automovel->getAutomoveisArea($_GET['area']);
        $lista_vendas = $venda->getAreaVendas($_GET['area']);

        // OPCOES AUTOMOVEL E CLIENTES
        if (is_array($lista_automovel)) {
            $opt_automovel = "";

            // verifica se venda é mesma que a quantidade de automoveis
            if (is_array($lista_vendas) && count($lista_automovel) == count($lista_vendas)) {
                SetAlert( "warning", "Todos os carros foram vendidos!");
            } else {
                // OPCOES AUTOMOVEIS
                foreach ($lista_automovel as $key => $value) {
                    $isVendido = false;
    
                    if (is_array($lista_vendas)) {
                        foreach ($lista_vendas as $keyid => $value2) {
                            // verifica se há venda do veiculo especifico antes de adiciona-lo
                            if ($value2['automovel_id'] == $value['id']) {
                                // veiculo foi vendido
                                $isVendido = true;
                                break;
                            }
                        }
                    }
    
                    if ($isVendido == true) {
                        continue;
                    }
    
                    $newTag = new tagHtml;
                    $newTag->setTag("option");
                    $newTag->setValue($value['nome']);
                    $newTag->addAtribute("value",$value['id']);
                    $opt_automovel .= $newTag->mount();
                }
    
                // OPCOES CLIENTES
                $cliente = new Cliente;
                $lista_cliente = $cliente->getClientes();
                $opt_cliente = "";
    
                if (is_array($lista_cliente)) {
                    foreach ($lista_cliente as $key => $value) {
                        $newTag = new tagHtml;
                        $newTag->setTag("option");
                        $newTag->setValue($value['nome'] . " " . $value['sobrenome']);
                        $newTag->addAtribute("value",$value['id']);
                        $opt_cliente .= $newTag->mount();
                    }
                }
            }
        } else {
            SetAlert( "danger", "Não há carros alocados para venda.");
        }

        // VENDA POST
        if (isset($_POST) && isset($_POST['automoveis']) && isset($_POST['clientes'])) {
            $automoveis_id = $_POST['automoveis'];
            $cliente_id = $_POST['clientes'];

            $result_venda = $automovel->venderAutomovel($automoveis_id, $cliente_id);
            //echo $result_venda;
            
            SetAlert(
                $result_venda ? "success" : "warning", 
                $result_venda ? "Venda efetuada com sucesso!" : "O carro já foi vendido!"
            );

            //Set_OpcoesAutomovel();
            //header("Location:./venda.php?area={$_GET['area']}");
        }
    ?>
    <div class="container p-5 my-5 border">
        <h1 class="h1">Venda de Automoveis da Area <?php echo $_GET['area'] ?></h1>
        <a class="btn btn-primary" href="./">voltar</a>
    </div>
    <div class="container p-5 my-5 border">
        <form action="#" method="post">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <label for="automoveis" class="form-label">Automoveis:</label>
                    <select name="automoveis" class="form-select">
                        <?php echo $opt_automovel; ?>
                    </select>
                </div>
                <div class="col">
                    <label for="clientes" class="form-label">Clientes:</label>
                    <select name="clientes" class="form-select">
                        <?php echo $opt_cliente; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <?php if (isset($alert)) { echo $alert; }; ?>
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-primary" type="submit">Vender</button>
            </div>
        </form>
    </div>
</body>
</html>