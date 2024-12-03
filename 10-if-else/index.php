<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descobrindo Par ou Ímpar!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #89CFF0, #A9D0F5); /* Gradiente de azul claro */
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        h1 {
            color: #ffffff;
            background-color: #4CAF50;
            text-align: center;
            padding: 20px;
            font-family: "Verdana", sans-serif;
            width: 100%;
            border-radius: 8px 8px 0 0;
            margin-bottom: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px); /* Efeito de elevação ao passar o mouse */
        }

        input[type="number"] {
            padding: 12px;
            font-size: 18px;
            margin-bottom: 20px;
            width: 100%;
            border-radius: 8px;
            border: 2px solid #4CAF50;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #45a049;
            outline: none;
        }

        button {
            padding: 12px 20px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }

        .result.par {
            color: #007bff;
            background-color: #e7f3fe;
        }

        .result.impar {
            color: #dc3545;
            background-color: #f8d7da;
        }

    </style>
</head>
<body>

    <div>
        <h1>Descubra se um número é par ou ímpar</h1>

        <div class="container">
            <input type="number" id="numero" placeholder="Digite um número">
            <button onclick="verificarNumero()">Verificar</button>

            <div class="result" id="resultado"></div>
        </div>
    </div>

    <script>
        function verificarNumero() {
            const numero = document.getElementById("numero").value;
            const resultadoDiv = document.getElementById("resultado");

            if (numero === "") {
                resultadoDiv.textContent = "Por favor, insira um número!";
                resultadoDiv.classList.remove("par", "impar");
                return;
            }

            if (numero % 2 === 0) {
                resultadoDiv.textContent = "O número " + numero + " é PAR!";
                resultadoDiv.classList.add("par");
                resultadoDiv.classList.remove("impar");
            } else {
                resultadoDiv.textContent = "O número " + numero + " é ÍMPAR!";
                resultadoDiv.classList.add("impar");
                resultadoDiv.classList.remove("par");
            }
        }
    </script>

</body>
</html>
