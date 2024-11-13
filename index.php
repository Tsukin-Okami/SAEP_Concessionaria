<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAEP Concessionaria</title>
    <link rel="stylesheet" href="source/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding: 5vh 20vw;
        }

        .planta {
            display: grid;
            background-color: #F2F2F2;

            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(10, 1fr);
            
            gap: 10px;
            padding: 10px;
        }

        .planta > div {
            text-align: center;

            padding: 20px 0;
            font-size: 30px;

            background-color: #FFFFFF;
            border: 2px solid #D8D8D8;
            border-radius: 4px;
            
        }

        .planta > div:hover {
            /*background-color: #F2F2F2;*/
            /*color: black;*/
            border-color: red;
            border-width: 6px;
        }

        .planta > .alocado {
            background-color: #0000FF;
            color: #FFFFFF;
        }

        .item1 {
            grid-column: 1 / span 3;
            grid-row: 1 / span 4;
        }

        .item2 {
            grid-column: 4 / span 2;
            grid-row: 1 / span 2;
        }

        .item3 {
            grid-column: 4 / span 2;
            grid-row: 3 / span 2;
        }

        .item4 {
            grid-column: 1 / span 2;
            grid-row: 5 / span 3;
        }

        .item5 {
            grid-column: 3;
            grid-row: 5 / span 3;
        }

        .item6 {
            grid-column: 4;
            grid-row: 5 / span 3;
        }

        .item7 {
            grid-column: 5;
            grid-row: 5 / span 3;
        }
    </style>
</head>
<body>
    <h1>SAEP Concessionaria</h1>
    <hr>
    <div class="planta">
        <div class="item1">1</div>
        <div class="item2">2</div>
        <div class="item3 alocado">3</div>  
        <div class="item4">4</div>
        <div class="item5">5</div>
        <div class="item6">6</div>
        <div class="item7 alocado">7</div>
        <div class="item8">8</div>  
        <div class="item9">9</div>
        <div class="item10">10</div>
    </div>
</body>
</html>