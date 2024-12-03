<?php

// Solicita ao usuário o salário do trabalhador
echo "Digite o salário do trabalhador: ";
$salario = floatval(fgets(STDIN)); // Captura a entrada do usuário como float

// Aplica o aumento de 10%
$aumento_10 = $salario * 0.10;
$salario_com_aumento_10 = $salario + $aumento_10;

// Aplica o desconto de 15% no salário após o aumento
$desconto_15 = $salario_com_aumento_10 * 0.15;
$salario_com_desconto_15 = $salario_com_aumento_10 - $desconto_15;

// Aplica o aumento de 40% no salário após o desconto
$aumento_40 = $salario_com_desconto_15 * 0.40;
$salario_final = $salario_com_desconto_15 + $aumento_40;

