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

        $automovel = new Automovel;
        $lista_automovel = $automovel->getAutomoveisArea($_GET['area']);
        
        if (is_array($lista_automovel)) {
            $opt_automovel = "";

            foreach ($lista_automovel as $key => $value) {
                $newTag = new tagHtml;
                $newTag->setTag("option");
                $newTag->setValue($value['nome']);
                $newTag->addAtribute("value",$value['id']);
                $opt_automovel .= $newTag->mount();
            }

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

        if (isset($_POST) && isset($_POST['automoveis']) && isset($_POST['clientes'])) {
            $automoveis_id = $_POST['automoveis'];
            $cliente_id = $_POST['clientes'];

            $result_venda = $automovel->venderAutomovel($automoveis_id, $cliente_id);
            //echo $result_venda;
            $newTag = new tagHtml;
            $newTag->setTag("div");
            
            if ($result_venda == true) {
                $result_venda = "Venda efetuada com sucesso!";
                $newTag->addAtribute("class","alert alert-success");
            } else {
                $result_venda = "O carro já foi vendido!";
                $newTag->addAtribute("class","alert alert-warning");
            }
            
            $newTag->setValue($result_venda);
            $result_venda = $newTag->mount();
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
                <button class="btn btn-outline-primary" type="submit">Vender</button>
            </div>
            <?php if (isset($result_venda)) { echo $result_venda; }; ?>
        </form>
    </div>
</body>
</html>