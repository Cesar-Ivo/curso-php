<?php
// Função para verificar se a string é um palíndromo
function verificarPalindromo($frase) {
    // Remover todos os caracteres não alfanuméricos e converter para minúsculas
    $fraseLimpa = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($frase));

    // Verificar se a string limpa é igual à sua inversa
    if ($fraseLimpa === strrev($fraseLimpa)) {
        return "É um palíndromo.";
    } else {
        return "Não é um palíndromo.";
    }
}

// Exemplo de entrada
$mensagemResultado = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entradaUsuario = $_POST['frase'];
    $mensagemResultado = verificarPalindromo($entradaUsuario);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos principais */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            color: #2575fc;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .input-group {
            margin: 20px 0;
        }

        input[type="text"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #2575fc;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #6a11cb;
        }

        .alert {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert.success {
            background-color: #4CAF50;
            color: white;
        }

        .alert.error {
            background-color: #f44336;
            color: white;
        }

        .info-box {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #333;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Verificador de Palíndromo</h1>
        <p>Digite uma palavra ou frase para verificar se é um palíndromo.</p>

        <!-- Explicação sobre o que é um palíndromo -->
        <div class="info-box">
            <strong>O que é um Palíndromo?</strong>
            <p>Um palíndromo é uma palavra, frase, número ou outra sequência de caracteres que se lê da mesma forma de trás para frente (desconsiderando espaços, pontuação e diferenças de maiúsculas e minúsculas).</p>
            <p>Exemplo: "A base do teto desaba" é um palíndromo.</p>
        </div>

        <!-- Formulário para inserir a frase -->
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="frase" placeholder="Digite uma palavra ou frase" required>
            </div>
            <input type="submit" value="Verificar">
        </form>

        <?php
        // Exibir o resultado
        if ($mensagemResultado) {
            echo '<div class="alert ' . ($mensagemResultado === "É um palíndromo." ? 'success' : 'error') . '">' . $mensagemResultado . '</div>';
        }
        ?>
    </div>
</body>
</html>
