<?php
    // Conexão com o BD
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Aula_09 - PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-secondary" style="min-height: 100vh;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="home.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="pizza.php">PIZZA</a>
        </li>
        </ul>
    </div>
    </nav>

    <div class="container mt-3">
        <h2 class="text-white">Pizza -
            <!--Botão para cadastrar novo usuário-->
            <a href="cadastroPizza.php" class="btn btn-dark btn-sm">Nova Pizza</a>
        </h2>       
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    // seleção de todos os usuários do BD 
                    $sql = "select * from pizza";
                    // PDO que executa a query SELECT
                    $sql = $pdo->query($sql);
                        // Verifica se a Query retornou
                        if ($sql->rowCount() > 0) {
                            // O loop percorre todo o Select
                            // imprimindo como user[]
                            foreach ($sql->fetchall() as $pizza) {
                                // Retorno das consultas na tabela
                                echo '<tr>';
                                    echo '<td>'.$pizza['nome'].'</td>';
                                    echo '<td>'.$pizza['preco'].'</td>';
                                    echo '<td><img src="'.$pizza['figura'].'" alt="Imagem da Pizza"
                                          style="max-width: 100px; max-height: 100px;"></td>';
                                    echo '<td>
                                            <a href=" ?cod=' . $pizza['cod'] . '">Editar</a> 
                                            - 
                                            <a href=" ?cod=' . $pizza['cod'] . '">Excluir</a>
                                          </td>';
                                echo '<tr>';            
                            }
                        } 
                ?>
            </tbody>
        </table>
    </div>
  
</body>
</html>