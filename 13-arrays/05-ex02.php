<?php
// Arrays para armazenar os dados dos diferentes grupos
$clientes = [];
$funcionarios = [];
$vendedores = [];
$socios = [];
$patrocinadores = [];

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtendo o tipo de cadastro e os dados inseridos
    $tipo = $_POST['tipo_cadastro'];

    // Criando um novo ID para cada tipo de cadastro
    $new_id = max(count($clientes), count($funcionarios), count($vendedores), count($socios), count($patrocinadores)) + 1;

    // Adicionando dados ao array correspondente
    if ($tipo == 'cliente') {
        $clientes[] = [
            'id' => $new_id,
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone']
        ];
    } elseif ($tipo == 'funcionario') {
        $funcionarios[] = [
            'id' => $new_id,
            'nome' => $_POST['nome'],
            'cargo' => $_POST['cargo'],
            'salario' => $_POST['salario']
        ];
    } elseif ($tipo == 'vendedor') {
        $vendedores[] = [
            'id' => $new_id,
            'nome' => $_POST['nome'],
            'regiao' => $_POST['regiao'],
            'meta' => $_POST['meta']
        ];
    } elseif ($tipo == 'socio') {
        $socios[] = [
            'id' => $new_id,
            'nome' => $_POST['nome'],
            'investimento' => $_POST['investimento'],
            'participacao' => $_POST['participacao']
        ];
    } elseif ($tipo == 'patrocinador') {
        $patrocinadores[] = [
            'id' => $new_id,
            'nome' => $_POST['nome'],
            'valor' => $_POST['valor'],
            'evento' => $_POST['evento']
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        h1 {
            width: 100%;
            text-align: center;
            color: #333;
        }
        .main-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
            width: 100%;
            max-width: 1200px;
        }
        .form-container, .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 45%;
            min-width: 350px;
            margin-bottom: 20px;
        }
        .form-container input, .form-container select {
            padding: 10px;
            margin: 5px;
            width: 100%;
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        @media screen and (max-width: 768px) {
            .main-container {
                flex-direction: column;
                align-items: center;
            }
            .form-container, .table-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<h1>Cadastro de Clientes, Funcionários, Vendedores, Sócios e Patrocinadores</h1>

<!-- Contêiner principal para organizar os elementos lado a lado -->
<div class="main-container">

    <!-- Formulário para adicionar dados -->
    <div class="form-container">
        <h2>Adicionar Novo Cadastro</h2>
        <form method="POST">
            <select name="tipo_cadastro" required>
                <option value="cliente">Cliente</option>
                <option value="funcionario">Funcionário</option>
                <option value="vendedor">Vendedor</option>
                <option value="socio">Sócio</option>
                <option value="patrocinador">Patrocinador</option>
            </select>
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="telefone" placeholder="Telefone (somente para Cliente)" required>
            <input type="text" name="cargo" placeholder="Cargo (somente para Funcionário)">
            <input type="number" name="salario" placeholder="Salário (somente para Funcionário)" min="0">
            <input type="text" name="regiao" placeholder="Região (somente para Vendedor)">
            <input type="number" name="meta" placeholder="Meta de Vendas (somente para Vendedor)" min="0">
            <input type="number" name="investimento" placeholder="Investimento (somente para Sócio)" min="0">
            <input type="number" name="participacao" placeholder="Participação (somente para Sócio)" min="0" step="0.01">
            <input type="number" name="valor" placeholder="Valor de Patrocínio (somente para Patrocinador)" min="0">
            <input type="text" name="evento" placeholder="Evento Patrocinado (somente para Patrocinador)">
            <button type="submit">Adicionar</button>
        </form>
    </div>

    <!-- Exibição dos dados cadastrados -->
    <div class="table-container">
        <h2>Clientes</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['telefone']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Funcionários</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Salário</th>
            </tr>
            <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td><?php echo $funcionario['id']; ?></td>
                    <td><?php echo $funcionario['nome']; ?></td>
                    <td><?php echo $funcionario['cargo']; ?></td>
                    <td><?php echo $funcionario['salario']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Vendedores</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Região</th>
                <th>Meta</th>
            </tr>
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor['id']; ?></td>
                    <td><?php echo $vendedor['nome']; ?></td>
                    <td><?php echo $vendedor['regiao']; ?></td>
                    <td><?php echo $vendedor['meta']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Sócios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Investimento</th>
                <th>Participação</th>
            </tr>
            <?php foreach ($socios as $socio): ?>
                <tr>
                    <td><?php echo $socio['id']; ?></td>
                    <td><?php echo $socio['nome']; ?></td>
                    <td><?php echo $socio['investimento']; ?></td>
                    <td><?php echo $socio['participacao']; ?>%</td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Patrocinadores</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Evento</th>
            </tr>
            <?php foreach ($patrocinadores as $patrocinador): ?>
                <tr>
                    <td><?php echo $patrocinador['id']; ?></td>
                    <td><?php echo $patrocinador['nome']; ?></td>
                    <td><?php echo $patrocinador['valor']; ?></td>
                    <td><?php echo $patrocinador['evento']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

</body>
</html>
