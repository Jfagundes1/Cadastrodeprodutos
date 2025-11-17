<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Cadastrar Produto</title>
</head>
<body>

<header><h1>Cadastrar Produto</h1></header>

<main>

<form action="cadastrar.php" method="POST" onsubmit="return validar()">
    <label>Nome:</label>
    <input type="text" name="nome" id="nome">

    <label>Preço:</label>
    <input type="number" name="preco" id="preco" step="0.01">

    <label>Categoria:</label>
    <select name="categoria_id">
        <?php
            $cat = $conn->query("SELECT * FROM categorias");
            while($c = $cat->fetch_assoc()) {
                echo "<option value='".$c['id']."'>".$c['nome']."</option>";
            }
        ?>
    </select>

    <button type="submit" class="btn">Salvar</button>
</form>

<a href="index.php" class="voltar">Voltar</a>

</main>

<?php
if($_POST){
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $cat_id = $_POST["categoria_id"];

    $sql = "INSERT INTO produtos (nome, preco, categoria_id)
            VALUES ('$nome', '$preco', '$cat_id')";

    if($conn->query($sql)){
        echo "<script>alert('Produto cadastrado!'); window.location='index.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

</body>
</html>
