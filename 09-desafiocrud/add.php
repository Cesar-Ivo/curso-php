<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nome = $_POST['nome']; 
    $email = $_POST['email']; 
    $sexo = $_POST['sexo']; 
    $bairro = $_POST['bairro']; 

    // Inserção dos dados no banco
    $conn->query("INSERT INTO clientes(nome, email, sexo, bairro) VALUES ('$nome', '$email', '$sexo', '$bairro')");

    // Redireciona para a página principal após inserção
    header("Location: index.php"); 
    exit();  
} 
?> 

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Adicionar Cliente</title> 
    <link rel="stylesheet" href="./css/style.css"> 
    <script src="./js/script.js"></script> 

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230525/pngtree-realistic-bread-bakery-image_2619826.jpg'); /* Imagem de fundo */
            background-size: cover; /* Faz a imagem cobrir toda a tela */
            background-position: right; /* colocar a imagem  a direita da tela*/
            background-attachment: fixed; /* Imagem fixa enquanto a página rola */
            color: #d32f2f;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Coloca os títulos um abaixo do outro */
            height: 100vh;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #d32f2f;
            margin: 0;
        }

        h1:first-of-type {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #d32f2f;; /* Cor dourada para o primeiro título */
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco com transparência */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        input, select, button {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        select {
            font-size: 1rem;
        }
    </style>
</head> 

<body> 
    <h1>🥐PADARIA TOQUE DE ARTE💖</h1> <!-- Título principal com emojis -->
    <h1>🥖Adicionar Cliente🥐</h1> <!-- Título secundário -->
    <form method="POST" onsubmit="return validadeformulario()"> 
        <label>Nome: <input type="text" name="nome" required></label><br> 
        <label>Email: <input type="email" name="email" required></label><br> 
        
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo" required>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
        </select><br>
        
        <label>Bairro: <input type="text" name="bairro" required></label><br> 

        <button type="submit">Salvar Cliente</button> 
    </form>
</body> 
</html>
