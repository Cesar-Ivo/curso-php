<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM clientes WHERE id = $id");
$cliente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $bairro = $_POST['bairro'];

    // Atualiza o cliente no banco de dados
    $conn->query("UPDATE clientes SET nome = '$nome', email = '$email', sexo = '$sexo', bairro = '$bairro' WHERE id = $id");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Editar Cliente</h1>

    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']); ?>" required>
        </div>

        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="Masculino" <?= $cliente['sexo'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                <option value="Feminino" <?= $cliente['sexo'] == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
            </select>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($cliente['bairro']); ?>" required>
        </div>

        <button type="submit">Atualizar</button>
    </form>

</body>
</html>
