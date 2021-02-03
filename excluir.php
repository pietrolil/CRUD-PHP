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

$sql = "DELETE FROM alunos_cadastrados WHERE id ='{$_GET['id']}'";

$result =$conn->query($sql);

$conn->close();

?>

<!DOCTYPE html>
<html>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <body>
        <?php 
        if($result == true):
        
        ?>
        <span><h6>Usuario Excluido com sucesso</h6></span>
        <a class="btn btn-warning" data-toggle="collapse" href="primario.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Inicio
        </a>
        <?php
        else:
        
        ?>
        <span><h6>Erro ao tentar excluir o aluno</h6></span>
        <a class="btn btn-warning" data-toggle="collapse" href="primario.html" role="button" aria-expanded="false" aria-controls="collapseExample">
          Inicio
        </a>
        <?php
        endif;
        ?>
    </body>

</html>
