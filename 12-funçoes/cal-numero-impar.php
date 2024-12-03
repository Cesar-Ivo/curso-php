<?php
// Função para verificar se um número é primo
function ehPrimo($numero) {
    if ($numero <= 1) {
        return false; // Números menores ou iguais a 1 não são primos
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false; // Se for divisível por algum número além de 1 e ele mesmo, não é primo
        }
    }
    return true; // Caso contrário, o número é primo
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os números do formulário (separados por vírgulas)
    $numeros = explode(',', $_POST['numeros']);
    
    // Exibe o resultado de cada número
    foreach ($numeros as $numero) {
        $numero = trim($numero); // Remove espaços extras
        if (is_numeric($numero)) {
            if (ehPrimo((int)$numero)) {
                echo "<div class='resultado sucesso'>O número $numero é primo. <strong>Verdadeiro</strong></div><br>";
            } else {
                echo "<div class='resultado erro'>O número $numero não é primo. <strong>Falso</strong></div><br>";
            }
        } else {
            echo "<div class='resultado erro'>O valor '$numero' não é um número válido. <strong>Falso</strong></div><br>";
        }
    }
}
?>

<!-- Informativo sobre números primos -->
<div class="informativo">
    <h2>O que é um número primo?</h2>
    <p>
        Um número <strong>primo</strong> é um número natural maior que 1 que só pode ser dividido por <strong>1</strong> e ele mesmo. Exemplo: 2, 3, 5, 7. 
        Já um número <strong>composto</strong> tem mais de dois divisores. Exemplo: 4 (divisível por 1, 2 e 4).
    </p>
    <h3>Como verificamos se um número é primo?</h3>
    <p>
        Para verificar se um número é primo, tentamos dividi-lo por todos os números entre 2 e a raiz quadrada do número. Se não for divisível por nenhum, é primo.
    </p>
</div>

<!-- Formulário HTML para o usuário digitar a lista de números -->
<form method="post">
    <label for="numeros">Digite os números separados por vírgula:</label>
    <input type="text" id="numeros" name="numeros" required>
    <button type="submit">Verificar</button>
</form>

<!-- Estilo CSS para os resultados e o informativo -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f9;
    }
    
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 0 auto;
    }

    label {
        font-size: 1.2em;
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Estilos para os resultados */
    .resultado {
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
        font-size: 1.1em;
    }

    .sucesso {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .erro {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Estilos para o informativo */
    .informativo {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto 20px;
    }

    .informativo h2, .informativo h3 {
        margin-top: 0;
        font-size: 1.5em;
    }

    .informativo p {
        font-size: 1.1em;
        line-height: 1.6;
        color: #333;
    }
</style>
