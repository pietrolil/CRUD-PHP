<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lista_alunos";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM alunos_cadastrados WHERE id = {$_GET['id']}";
$result = $conn->query($sql);
$conn->close();
$aluno = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <form action="editar_aluno.php" method="post">
    <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
    <script src="jquery.mask.min.js"></script>
    <script src="jquery.validate.min.js"></script>
</head>

<body>
  <div class="form-group">
    <label for="name">Nome:</label>
    <input name="novoname" class="form-control" id="name" type="text" value="<?= $aluno['name'] ?>">
  </div>
  <div class="form-group">
    <label for="mail">Email::</label>
    <input name="novomail" class="form-control" id="mail" type="text" value="<?= $aluno['mail'] ?>">
  </div>
  <div class="form-group">
    <label for="phone">Telefone:</label>
    <input type="text" name="novophone" class="form-control" id="phone" value="<?= $aluno['phone'] ?>" maxlength="15">
  </div>
  <div class="form-group">
    <label for="course">Curso</label>
    <select name="novocourse" value="<?= $aluno['course'] ?>" class="form-control" id="course">
      <option><?= $aluno['course'] ?></option>
      <option>Design</option>
      <option>Programação</option>
      <option>Web Developer</option>
      <option>Teste de Software</option>
      <option>Infraestrutura</option>
      <option>Desenvolvimento de Games</option>
    </select>
  </div>
  <div class="form-group">
    <label for="message">Descrição</label>
    <textarea class="form-control" name="novomessage" id="message" rows="10" cols="30"><?= $aluno['message'] ?></textarea>
  </div>
  <div class="button">
    <button type="submit" class="btn btn-dark">Atualizar</button>
  </div>

  </form>
  <script>
    $(document).ready(function() {
      $('#phone').mask('(00)0000-0000');
    });
      $(document).ready(function() {
        $('#phone').mask('(00)0000-0000');

        $("#form").validate({
          rules: {
            name: {
              required: true,
              minlength: 4
            },
            phone: {
              required: true,
              minlength: 8
            },
            mail: {
              required: true,
              minlength: 10
            },
            course: {
              required: true,

            },
            message: {
              required: true,
              minlength: 100
            }

          },
          messages: {
            name: {
              required: "Por favor preencha o seu nome",
              minlength: jQuery.validator.format("Preencha ao menos {0} caracteres")
            },
            phone: {
              required: "Por favor preencha o seu numero de telefone",
              minlength: jQuery.validator.format("Preencha ao menos {0} caracteres")
            },
            mail: {
              required: "Por favor preencha o seu email",
              minlength: jQuery.validator.format("Preencha ao menos {0} caracteres")
            },
            course: {
              required: "Por favor selecione o seu curso",
            },
            message: {
              required: "Por favor preencha a descrição",
              minlength: jQuery.validator.format("Preencha ao menos {0} caracteres")
            }
          }
        });

      });
  </script>
</body>

</html>