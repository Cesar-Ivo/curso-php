<?php
//usando variável do tipo boolean(verdadeiro ou falso):
$logado = true;

if ($logado){
    echo "Bem vindo ao painel de controle.";
}else {
    echo "Você não esta logado. Faça o Login!";
}
//==================
echo "<hr>";
//Ponto FLutuante:
$altura = 1.;
echo "altura: $altura m"; //Saída: altura: 1.85m
//==================
echo "<hr>";
//integer
$idade =17.5;
echo "idade: $idade";
//===================
echo "<hr>";
//Array:
$filhos = [ "João","Maria", "pedro","Ana"];
echo $filhos[1];
//===================
echo "<hr>";
//objeto:
class pessoa{
    public $nome;
    public $idade;

    public function _construct ($nome,$idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }
    public function apresentar(){
        return "Olá, meu nome é $this->nome e tenho $this->idade anos.";
}
}
$pessoa = new Pessoa("Cesar", 38);
echo $pessoa->apresentar();

?>
