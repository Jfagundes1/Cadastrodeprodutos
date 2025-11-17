<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Produtos</title>
</head>
<body>

<header><h1>Lista de Produtos</h1></header>

<main>
    <a href="cadastrar.php" class="btn">Cadastrar Novo Produto</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>

        <?php
            $sql = "SELECT produtos.*, categorias.nome AS categoria 
                    FROM produtos 
                    LEFT JOIN categorias 
                    ON produtos.categoria_id = categorias.id";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while($linha = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>".$linha['id']."</td>
                            <td>".$linha['nome']."</td>
                            <td>R$ ".$linha['preco']."</td>
                            <td>".$linha['categoria']."</td>
                            <td>
                                <a class='editar' href='editar.php?id=".$linha['id']."'>Editar</a>
                                <a class='excluir' href='excluir.php?id=".$linha['id']."'
                                onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                            </td>
                          </tr>";
                }
            }
        ?>
    </table>
</main>

</body>
</html>
