<?php

// Função para calcular a Progressão Aritmética (PA)
function progressaoAritmetica($a1, $r, $n) {
    return $a1 + ($n - 1) * $r;
}

// Função para calcular a Progressão Geométrica (PG)
function progressaoGeometrica($a1, $r, $n) {
    return $a1 * pow($r, $n - 1);
}

// Função para gerar a apresentação
function calcularProgressao($numTermos) {
    // Definindo o primeiro termo (a1) e a razão (r)
    $a1 = 1;  // Primeiro termo
    $r = 2;   // Razão

    // Gerar a lista de termos da PA e PG
    $pa = [];
    $pg = [];
    for ($i = 1; $i <= $numTermos; $i++) {
        $pa[] = progressaoAritmetica($a1, $r, $i);
        $pg[] = progressaoGeometrica($a1, $r, $i);
    }

    return ['pa' => $pa, 'pg' => $pg];
}

// Recebe o número de termos a ser calculado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numTermos = $_POST['numTermos'];
    $resultados = calcularProgressao($numTermos);
} else {
    $numTermos = 5; // Valor padrão
    $resultados = calcularProgressao($numTermos);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progressões Aritmética e Geométrica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #f8b400, #ff4e50);
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 50px;
            font-size: 3em;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            margin: 0 auto;
        }

        .resultados {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .resultados div {
            margin: 0 20px;
        }

        .resultados h2 {
            font-size: 2em;
        }

        .termos {
            font-size: 1.2em;
            margin-top: 15px;
            text-align: left;
        }

        input[type="number"] {
            padding: 10px;
            font-size: 1.2em;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 2px solid #f8b400;
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #f8b400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff4e50;
        }
    </style>
</head>
<body>
    <h1>Progressões Aritmética e Geométrica</h1>

    <div class="container">
        <form method="POST">
            <input type="number" name="numTermos" value="<?= $numTermos ?>" min="1" max="20" required>
            <button type="submit">Calcular</button>
        </form>

        <div class="resultados">
            <div>
                <h2>Progressão Aritmética (PA)</h2>
                <div class="termos">
                    <?php
                    foreach ($resultados['pa'] as $index => $termo) {
                        echo "Termo " . ($index + 1) . ": " . $termo . "<br>";
                    }
                    ?>
                </div>
            </div>

            <div>
                <h2>Progressão Geométrica (PG)</h2>
                <div class="termos">
                    <?php
                    foreach ($resultados['pg'] as $index => $termo) {
                        echo "Termo " . ($index + 1) . ": " . $termo . "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
