<?php
// Função para gerar a senha aleatória
function gerarSenha($comprimento) {
    $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $minusculas = 'abcdefghijklmnopqrstuvwxyz';
    $numeros = '0123456789';
    $caracteresEspeciais = '!@#$%^&*()_+-=[]{}|;:,.<>?';
    
    // Combina todos os caracteres possíveis
    $todosCaracteres = $maiusculas . $minusculas . $numeros . $caracteresEspeciais;
    
    // Garantir que a senha tenha pelo menos um caractere de cada tipo
    $senha = '';
    $senha .= $maiusculas[rand(0, strlen($maiusculas) - 1)];
    $senha .= $minusculas[rand(0, strlen($minusculas) - 1)];
    $senha .= $numeros[rand(0, strlen($numeros) - 1)];
    $senha .= $caracteresEspeciais[rand(0, strlen($caracteresEspeciais) - 1)];
    
    // Preencher o restante da senha com caracteres aleatórios
    for ($i = 4; $i < $comprimento; $i++) {
        $senha .= $todosCaracteres[rand(0, strlen($todosCaracteres) - 1)];
    }
    
    // Embaralhar a senha
    $senha = str_shuffle($senha);
    
    return $senha;
}

// Função para salvar a senha no arquivo
function salvarSenha($senha) {
    $arquivo = 'senhas.txt';  // Arquivo onde a senha será salva
    
    // Verifica se o arquivo existe e o abre para append (adicionar sem sobrescrever)
    $file = fopen($arquivo, 'a');
    if ($file) {
        fwrite($file, $senha . PHP_EOL);  // Salva a senha no arquivo
        fclose($file);
    } else {
        echo 'Erro ao salvar a senha.';
    }
}

// Função para verificar o login
function verificarLogin($senhaInformada) {
    $arquivo = 'senhas.txt';  // Arquivo onde as senhas estão salvas
    $senhasSalvas = file($arquivo, FILE_IGNORE_NEW_LINES);  // Lê o arquivo e ignora as novas linhas
    
    // Verifica se a senha informada corresponde a alguma salva
    if (in_array($senhaInformada, $senhasSalvas)) {
        echo '<div class="alert success">Login bem-sucedido!</div>';
    } else {
        echo '<div class="alert error">Senha incorreta! Tente novamente.</div>';
    }
}

// Exemplo de uso: Gerar uma senha e salvá-la
$comprimento = 12;  // Tamanho da senha desejado
$senhaGerada = gerarSenha($comprimento);
salvarSenha($senhaGerada);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senha e Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos principais */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
            color: #333;
        }

        h1 {
            font-size: 2.5em;
            color: #2575fc;
        }

        p {
            color: #666;
            font-size: 18px;
        }

        .btn {
            background-color: #2575fc;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin: 10px 0;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #6a11cb;
        }

        .alert {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert.success {
            background-color: #4CAF50;
            color: white;
        }

        .alert.error {
            background-color: #f44336;
            color: white;
        }

        input[type="password"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            margin: 20px 0;
            font-size: 18px;
        }

        .password-box {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .password-box p {
            font-weight: bold;
            color: #333;
        }

        .password-box div {
            font-size: 1.2em;
            color: #2575fc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Senha</h1>
        <p>A senha gerada foi criada com sucesso. Abaixo, você pode tentar fazer login com ela.</p>
        
        <div class="password-box">
            <p>Senha gerada:</p>
            <div><strong><?php echo $senhaGerada; ?></strong></div>
        </div>

        <h2>Login</h2>
        <form method="POST" action="">
            <input type="password" id="senha" name="senha" placeholder="Digite a senha gerada" required>
            <input type="submit" class="btn" value="Entrar">
        </form>

        <?php
        // Verifica o login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $senhaLogin = $_POST['senha'];
            verificarLogin($senhaLogin);
        }
        ?>
    </div>
</body>
</html>
