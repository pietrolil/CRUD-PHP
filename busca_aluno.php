
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lista_alunos";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM alunos_cadastrados WHERE name LIKE '%".$_POST['name']."%'";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    
</head>
<body>
    <?php
    
    if ($result->num_rows > 0):
        while($row = $result->fetch_assoc()):
    ?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Informações do Aluno</h5>
    <p class="card-text">
        <span><?= $row['name']?></span><br>
    <span><?= $row['mail']?></span><br>
    <span><?= $row['phone']?></span><br>
    <span><?= $row['course']?></span><br>
    <span><?= $row['message']?></span><br>
    <span>O que deseja fazer agora?</span>
    <a class="btn btn-success" data-toggle="collapse" href="editar.php?id=<?= $row['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
          Editar
        </a>
    <a class="btn btn-danger" data-toggle="collapse" href="excluir.php?id=<?=$row['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
          Excluir
        </a>    </p>
    </div>
    </div>
    
    
    <?php
        endwhile;
    else:
    ?>
    <span><h6>Usuário não encontrado!<h6></span><br>
    <a class="btn btn-info" data-toggle="collapse" href="buscar.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Tentar novamente
        </a>
    <?php
    endif;
    ?>
</body>
</html>

