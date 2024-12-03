<?php
// Função para contar palavras únicas
function contarPalavrasUnicas($texto) {
    // Converte a string para minúsculas
    $texto = strtolower($texto);

    // Remove caracteres especiais, deixando apenas letras, números e espaços
    $texto = preg_replace('/[^a-záéíóúãõâêîôûàèìòù0-9\s]/u', '', $texto);

    // Separa as palavras com base em espaços
    $palavras = preg_split('/\s+/', $texto);

    // Remove palavras vazias após a separação
    $palavras = array_filter($palavras, fn($palavra) => !empty($palavra));

    // Remove duplicatas e conta as palavras únicas
    $palavrasUnicas = array_unique($palavras);

    // Retorna o número de palavras únicas
    return count($palavrasUnicas);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitiza a entrada para evitar problemas de segurança
    $texto = isset($_POST['texto']) ? trim($_POST['texto']) : '';

    // Verifica se o texto não está vazio
    if (empty($texto)) {
        $erro = "Por favor, insira um texto válido.";
    } else {
        // Conta as palavras únicas
        $quantidade = contarPalavrasUnicas($texto);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar Palavras Únicas</title>
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

        textarea {
            width: 100%;
            height: 150px;
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
        }

        .resultado span {
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Contar Palavras Únicas</h1>
    <form method="post">
        <label for="texto">Digite o texto:</label>
        <!-- Mantém o texto no campo após envio -->
        <textarea id="texto" name="texto" required><?= htmlspecialchars($texto ?? '') ?></textarea>
        <button type="submit">Contar Palavras</button>
    </form>

    <?php if (isset($erro)): ?>
        <div class="erro">
            <span><?= $erro ?></span>
        </div>
    <?php endif; ?>

    <?php if (isset($quantidade)): ?>
        <div class="resultado">
            <?php if ($quantidade > 0): ?>
                <span>Existem <?= $quantidade ?> palavras únicas no texto fornecido.</span>
            <?php else: ?>
                <span><strong>Nenhuma palavra válida foi encontrada!</strong></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
