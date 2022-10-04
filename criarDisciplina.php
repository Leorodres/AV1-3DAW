<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "av1daw";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($connection->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Disciplina AV1</title>
</head>

<body>
    <div>
    <div><a style="margin-right: 25px" href="./criarDisciplina.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterarDisciplina.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagarDisciplina.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibirDisciplina.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodasDisciplinas.php">Exibir Todas</a></div>    </div>
    </div>

    <br>
    <form action="criarDisciplina.php" method="POST">

        <label for="nome">Digite o nome da disciplina: </label>
        <input type="text" name="nome"><br>

        <label for="periodo">Digite o periodo da Disciplina: </label>
        <input type="text" name="periodo"><br>

        <label for="preRequesito">Digite o pre-requisito: </label>
        <input type="text" name="preRequesito"><br>

        <label for="credito">Digite o credito necessário: </label>
        <input type="text" name="credito"><br>

        <input name="botaoCriar" type="submit" value="Enviar">

    </form>
</body>

</html>

<?php


if (isset($_POST["botaoCriar"])) {

    $nome = $_POST["nome"];
    $periodo = $_POST["periodo"];
    $preRequesito = $_POST["preRequesito"];
    $credito = $_POST["credito"];

    $inserirSQL = "INSERT INTO `disciplina`(`nome`, `periodo`, `idPreRequesito`, `creditos`) VALUES ('$nome','$periodo','$preRequesito','$credito')";

    $result = $connection->query($inserirSQL);


    if ($result == true) {
        echo "<p>Disciplina Criada</p>";
    } else {
        echo "<p>Falha na Criação</p>";
    }
}

?>