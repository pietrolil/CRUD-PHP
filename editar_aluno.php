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

$sql = "UPDATE alunos_cadastrados SET name='{$_POST['novoname']}', phone='{$_POST['novophone']}', course='{$_POST['novocourse']}', mail='{$_POST['novomail']}' , message='{$_POST['novomessage']}' , datamodifica=NOW() WHERE id = '{$_POST['id']}'";
//$modifica = "UPDATE alunos_cadastrados SET datamodifica=NOW() WHERE id = '{$_POST['id']}'";
$execute = $conn->query($sql);
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
    if ($execute === TRUE):
    ?>
    <span><h6> Atualização realizada com sucesso!</h6></span>
    <a class="btn btn-success" data-toggle="collapse" href="primario.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Inicio
        </a>
    <?php
    else:
    ?>
    <span><h6>Erro ao tentar atualizar</h6></span>
    <a class="btn btn-success" data-toggle="collapse" href="primario.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Voltar
        </a>
    <?php
    endif;
    ?>
</body>
</html>