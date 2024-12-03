<?php
// Inicializando um array para armazenar as idades
$idades = [];

// Laço for para coletar as idades
for ($i = 1; $i <= 5; $i++) {
    echo "número: $i<br>";
    
}

// Exibindo as idades e suas respectivas classificações
echo "\nClassificação das idades:\n";
foreach ($idades as $idade) {
    echo "Idade: $idade - ";

    if ($idade >= 0 && $idade <= 12) {
        echo "Criança\n";
    } elseif ($idade >= 13 && $idade <= 17) {
        echo "Adolescente\n";
    } elseif ($idade >= 18 && $idade <= 59) {
        echo "Adulto\n";
    } else {
        echo "Idoso\n";
    }
}
?>
