<?php
// Solicitar ao usuário um número inteiro positivo
$contador = 6;
do {
    echo "contador: $contador<br>";
    $contador++;
} while ($contador <= 10);

// Verificar se o número foi enviado via GET ou POST (em um ambiente web)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura o número inserido pelo usuário no formulário
    $numero = $_POST['numero'];

    // Verificar se o número é válido
    $numero = trim($numero); // Remove espaços extras
    if (!is_numeric($numero) || $numero <= 0) {
        echo "Por favor, insira um número inteiro positivo válido.<br>";
        exit; // Sai do script se o número não for válido
    }

    // Iniciar a soma dos números pares
    $soma = 0;
    $i = 1;

    // Laço do-while para somar os números pares
    do {
        if ($i % 2 == 0) {
            $soma += $i; // Adiciona à soma se o número for par
        }
        $i++; // Incrementa o contador
    } while ($i <= $numero); // Continua até o número fornecido

    // Exibir o resultado
    echo "A soma dos números pares de 1 até $numero é: $soma<br>";
} else {
    // Se a solicitação não for via POST, exibe o formulário
    echo '<form method="POST" action="">
            Digite um número inteiro positivo: 
            <input type="text" name="numero">
            <input type="submit" value="Enviar">
          </form>';
}
?>
