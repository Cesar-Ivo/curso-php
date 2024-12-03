<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Média</title>
    <style>
        /* Estilos do fundo exótico */
        body {
            background-color: #ff4081; /* Fundo com cor vibrante */
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6); /* Fundo escuro translúcido para contraste */
            padding: 30px;
            border-radius: 10px;
            width: 300px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.1em;
            margin: 10px 0;
            display: block;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 1em;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .resultado {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cálculo de Média</h1>
        <label for="nota1">Primeira Nota (0 a 10):</label>
        <input type="number" id="nota1" min="0" max="10" step="0.1" required>

        <label for="nota2">Segunda Nota (0 a 10):</label>
        <input type="number" id="nota2" min="0" max="10" step="0.1" required>

        <button onclick="calcularMedia()">Calcular Média</button>

        <div class="resultado" id="resultado"></div>
    </div>

    <script>
        function calcularMedia() {
            // Pegando as notas inseridas
            var nota1 = parseFloat(document.getElementById('nota1').value);
            var nota2 = parseFloat(document.getElementById('nota2').value);

            // Verificar se as notas são válidas
            if (isNaN(nota1) || isNaN(nota2) || nota1 < 0 || nota1 > 10 || nota2 < 0 || nota2 > 10) {
                document.getElementById('resultado').innerHTML = "<span style='color: red;'>Por favor, insira notas válidas entre 0 e 10.</span>";
                return;
            }

            // Calculando a média
            var media = (nota1 + nota2) / 2;
            var resultado = "";

            // Verificando a situação do aluno
            if (media >= 7) {
                resultado = "Situação: Aprovado!";
            } else if (media >= 5) {
                resultado = "Situação: Recuperação!";
            } else {
                resultado = "Situação: Reprovado!";
            }

            // Exibindo a média e a situação
            document.getElementById('resultado').innerHTML = `Média: ${media.toFixed(2)} <br> ${resultado}`;
        }
    </script>
</body>
</html>
