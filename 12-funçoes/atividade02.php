<?php
// Variáveis iniciais
$resultado = null;
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os valores do formulário
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacao = $_POST['operacao'];

    // Verifica se a operação foi escolhida
    if (empty($num1) || empty($num2)) {
        $mensagem = "Por favor, insira dois números válidos.";
    } else {
        // Realiza a operação escolhida
        if ($operacao == "soma") {
            $resultado = $num1 + $num2;
        } elseif ($operacao == "subtracao") {
            $resultado = $num1 - $num2;
        } elseif ($operacao == "multiplicacao") {
            $resultado = $num1 * $num2;
        } elseif ($operacao == "divisao") {
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $mensagem = "Erro! Divisão por zero não permitida.";
            }
        } else {
            $mensagem = "Operação inválida! Escolha uma operação válida.";
        }
    }

    // Caso o usuário tenha escolhido "sair", apenas limpa os valores
    if ($operacao == "sair") {
        $num1 = $num2 = $operacao = null;
        $resultado = null;
        $mensagem = "Calculadora encerrada.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>
    <h1>Calculadora PHP</h1>
    
    <form method="POST" action="">
        <label for="num1">Primeiro número:</label>
        <input type="number" name="num1" value="<?= isset($num1) ? $num1 : '' ?>" required><br><br>

        <label for="num2">Segundo número:</label>
        <input type="number" name="num2" value="<?= isset($num2) ? $num2 : '' ?>" required><br><br>

        <label for="operacao">Escolha a operação:</label>
        <select name="operacao" required>
            <option value="soma" <?= isset($operacao) && $operacao == "soma" ? 'selected' : '' ?>>Soma</option>
            <option value="subtracao" <?= isset($operacao) && $operacao == "subtracao" ? 'selected' : '' ?>>Subtração</option>
            <option value="multiplicacao" <?= isset($operacao) && $operacao == "multiplicacao" ? 'selected' : '' ?>>Multiplicação</option>
            <option value="divisao" <?= isset($operacao) && $operacao == "divisao" ? 'selected' : '' ?>>Divisão</option>
            <option value="sair" <?= isset($operacao) && $operacao == "sair" ? 'selected' : '' ?>>Sair</option>
        </select><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== null): ?>
        <h3>Resultado: <?= $resultado ?></h3>
    <?php endif; ?>
    
    <?php if ($mensagem): ?>
        <p style="color: red;"><?= $mensagem ?></p>
    <?php endif; ?>

</body>
</html>
