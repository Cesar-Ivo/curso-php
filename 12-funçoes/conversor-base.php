<?php
// Função para converter o número
function converterNumero($numero, $base) {
    switch ($base) {
        case 'binario':
            return decbin($numero); // Converte para binário
        case 'octal':
            return decoct($numero); // Converte para octal
        case 'hexadecimal':
            return dechex($numero); // Converte para hexadecimal
        default:
            return "Base inválida!";
    }
}

// Função para gerar uma explicação sobre a base escolhida
function gerarExplicacao($base) {
    switch ($base) {
        case 'binario':
            return "O sistema binário é baseado em dois números: 0 e 1. Cada posição representa uma potência de 2.";
        case 'octal':
            return "O sistema octal é baseado em oito números: de 0 a 7. Cada posição representa uma potência de 8.";
        case 'hexadecimal':
            return "O sistema hexadecimal é baseado em 16 números: de 0 a 9 e A a F. Cada posição representa uma potência de 16.";
        default:
            return "";
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitiza a entrada para evitar problemas de segurança
    $numero = isset($_POST['numero']) ? (int)$_POST['numero'] : 0;
    $base = isset($_POST['base']) ? $_POST['base'] : '';

    // Valida se o número é válido
    if ($numero <= 0) {
        $erro = "Por favor, insira um número válido maior que 0.";
    } else {
        // Converte o número para a base escolhida
        $resultado = converterNumero($numero, $base);
        // Gera a explicação sobre a base escolhida
        $explicacao = gerarExplicacao($base);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Base</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 1.2em;
            color: #333;
        }

        input[type="number"], select {
            width: 100%;
            padding: 10px;
            font-size: 1.1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #e0ffe0;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
            color: #2d6a4f;
        }

        .erro {
            background-color: #ffdddd;
            color: #d9534f;
            padding: 15px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .explicacao {
            margin-top: 15px;
            padding: 10px;
            background-color: #f0f8ff;
            border-radius: 5px;
            font-size: 1.1em;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Conversão de Base</h1>
    <form method="post">
        <label for="numero">Digite o número decimal:</label>
        <input type="number" id="numero" name="numero" required min="1" value="<?= isset($numero) ? $numero : '' ?>">

        <label for="base">Escolha a base:</label>
        <select id="base" name="base" required>
            <option value="binario" <?= (isset($base) && $base === 'binario') ? 'selected' : '' ?>>Binário</option>
            <option value="octal" <?= (isset($base) && $base === 'octal') ? 'selected' : '' ?>>Octal</option>
            <option value="hexadecimal" <?= (isset($base) && $base === 'hexadecimal') ? 'selected' : '' ?>>Hexadecimal</option>
        </select>

        <button type="submit">Converter</button>
    </form>

    <?php if (isset($erro)): ?>
        <div class="erro">
            <span><?= $erro ?></span>
        </div>
    <?php endif; ?>

    <?php if (isset($resultado)): ?>
        <div class="resultado">
            <span>O número <?= $numero ?> em base <?= ucfirst($base) ?> é: <strong><?= strtoupper($resultado) ?></strong></span>
        </div>
        <div class="explicacao">
            <p><?= $explicacao ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
