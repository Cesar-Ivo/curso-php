<?php
$dia = "brasil";

switch ($dia){
    case "segunda":
        echo "hoje é o primeiro dia útil da semana.";
        break;
        case "terça";
        echo "hoje é o segundo dia útil da semana.";
        break;
        case "quarta";
        echo "hoje é o terceiro dia útil da semana.";
        break;
        case "quinta";
        echo "hoje é o quarto dia útil da semana.";
        break;
        case "sexta";
        echo "hoje é o quinto dia útil da semana.";
        break;
        case "sábado";
        case "domingo":
            echo "É Fim de semana!";
            break;
            default:
            echo" É um dia útil qualquer.";
}
?>