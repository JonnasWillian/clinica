<?php

require '../dados/bd.php';

//include '../dados/bd.php';
//$pdo = Banco::conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$idade = $_POST['idade'];
$telefone = $_POST['telefone'];
$probSaude = $_POST['probSaude'];
$planSaude = $_POST['planSaude'];
$atendente = $_POST['atendente'];
$num_plan = $_POST['num_plan'];
$cpf = $_POST['cpf'];

/*$pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO clientes (nome,email,idade,telefone,planSaude,probSaude) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$email,$idade,$telefone,$planSaude,$probSaude));
            Banco::desconectar();
            header("Location: index.php");*/

//$sql = "INSERT INTO clientes (nome,email,idade,telefone,planSaude,probSaude) VALUES ('$nome','$email', $idade, $telefone, '$planSaude','$probSaude')";

$insert = $mysql->prepare("INSERT INTO clientes (nome,email,idade,telefone,planSaude,probSaude, doutor, num_plan, cpf) VALUES ('$nome','$email', $idade, $telefone, '$planSaude','$probSaude', '$atendente', '$num_plan', '$cpf')");
$insert -> execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar cadastro</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Exo"> </head>

    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="script.js">


</head>
<body>

    <div class="text-center">
        <h1>Paciente Cadastrado</h1>
        <a href="./../inicial.html"><button class="btn btn-primary">Retornar a Página inicial</button></a>
    </div>
    
</body>
</html>