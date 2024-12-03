<?php

// criando um array com 20 elementos(nomes de cidades)
$cities = [
"São paulo","Rio de janeior","Belo Horizonte","Brasilia","Curitiba",
"Salvador", "Fortaleza","Porto Alegre", "Manaus", "Recife",
"Belém", "Florianópolis", "Goiânia", "Campo Grande", "Natal",
"João Pessoa", "Maceio", "Aracaju", "Vitória", "Cuiaba"
];

// Percorrendo a array e exibindo o indice e o valor de cada elemento
foreach ($cities as $index => $city){
   if ( strpos($city,"F") === 0 ) {

    echo "$city<br>";
}
}
