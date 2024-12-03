<?php
include 'config.php';

$result = $conn->query("SELECT * FROM clientes");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes - Padaria Toque de Arte :) </title>
    <style>
        /* Estilo Global */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #ffcc00;
            color: #333;
            margin-bottom: 20px;
            font-size: 32px;
            border-bottom: 2px solid #333;
        }

        a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #28a745;
            border-radius: 5px;
            margin: 15px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #218838;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color: #007bff;
            margin-right: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            color: #0056b3;
        }

        td a.delete {
            color: #dc3545;
        }

        td a.delete:hover {
            color: #c82333;
        }

    </style>
</head>
<body>

    <h1>Lista de Clientes - Padaria Toque de Arte :)</h1>
    <div style="text-align: center;">
        <a href="add.php">Criar Clientes</a>
    </div>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Bairro</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['nome']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['sexo']); ?></td>
            <td><?= htmlspecialchars($row['bairro']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Editar</a>
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar este cliente?')" class="delete">Deletar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
