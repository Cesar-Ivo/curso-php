<?php

function login(){
$logado = true;

if ($logado){
    echo "Painel de controle";
} else {
    echo "Faça login para acessar o cpanel";
}

}
echo login();