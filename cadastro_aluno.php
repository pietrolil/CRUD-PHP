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

$sql = "INSERT INTO alunos_cadastrados (name, mail, course,phone,message)
VALUES ('". $_POST['name'] ."','". $_POST['mail'] ."','" . $_POST['course'] ."','" . $_POST['phone'] . "' ,'". $_POST['message'] ."');";


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
        if (mysqli_query($conn, $sql)):
    ?>
    <span><h6>Novo aluno adicionado com sucesso!</span><br>
    <a class="btn btn-warning" data-toggle="collapse" href="primario.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Inicio
        </a>
    <?php 
    else:
    ?>
    <h6> Não foi possivel criar o cadastro<br>
    <a class="btn btn-primary" data-toggle="collapse" href="cadastrar.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Tentar novamente
        </a>
    <?php 
    endif;
    ?>

</body>
</html>

<?php
$conn->close();
?>


