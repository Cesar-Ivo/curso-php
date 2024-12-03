<?php
// Sem usar funções:
$area1 = 10 * 5;
$area2 = 7 * 98;

echo $area1;
echo "<br>";
echo $area2;

//Com função:
function calcularArea($largura, $altura){
return $largura * $altura;
}
$area1 = calcularArea(10, 5); 
$area2 = calcularArea(7, 3); 
echo "<br>";
echo $area1;
echo "<br>";
echo area2;