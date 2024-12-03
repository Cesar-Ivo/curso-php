<?php
//solicita ao usuário o sálario inicial

$salario_inicial = R$ 3.000,00
echo "Os salarios terão aumento de 10%. de R$'.$salario.'para R$'.($salario+$salario+$aumento)).'.';


//Aumento de 10%
$salario_com_aumento = $salario_inicial*1.10;
//Desconto de 15%
$salario_com_desconto = $salario_com_aumento*0.85;
//aumento de 40%
$salariio_final = $salario_com_aumento*1.40;

//exibe o valor final com duas casas decimais
echo"O salário final após os aumentos e desconto é R$".number_format($salario_final,2',',','). "\n";

?>

