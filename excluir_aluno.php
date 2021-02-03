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

// sql to delete a record
$sql = "DELETE FROM alunos_cadastrados WHERE name ='{$_POST['name']}'";


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
    if ($conn->query($sql) === TRUE):
    ?>
    <span><h6>Aluno deletado com sucesso!</h6></span>
    <a class="btn btn-success" data-toggle="collapse" href="primario.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Inicio
        </a>
    <?php
    else:
    ?>
    <span><h6>Erro ao tentar excluir o aluno</h6></spam>
    <a class="btn btn-success" data-toggle="collapse" href="excluir.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Tentar Novamente
        </a>
    <?php
    endif;
    ?>
    
</body>
</html>

<?php
$conn->close();
?>