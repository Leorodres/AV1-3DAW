<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "av1daw";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn= new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($conn->connect_error) {
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
        <a style="margin-right: 25px" href="./criarDisciplina.php">Criar Disciplina</a> 
        <a style="margin-right: 25px" href="./alterarDisciplina.php">Alterar Disciplina</a> 
        <a style="margin-right: 25px" href="./apagarDisciplina.php">Apagar Disciplina</a> 
        <a style="margin-right: 25px" href="./exibirDisciplina.php">Exibir</a>
        <a style="margin-right: 25px" href="./exibirTodasDisciplinas.php">Exibir Todas</a>
        <a style="margin-right: 25px" href="./usuarioArquivo.php">Inserir Usuário</a>
    </div>

    <br>
    <form action="criarDisciplina.php" method="POST">

        <label for="nome">Digite o nome da disciplina: </label>
        <input type="text" name="nome"><br>

        <label for="periodo">Digite o periodo da Disciplina: </label>
        <input type="text" name="periodo"><br>

        <label for="preRequisito">Digite o pre-requisito: </label>
        <input type="text" name="preRequisito"><br>

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
    $preRequisito = $_POST["preRequisito"];
    $credito = $_POST["credito"];

    $sql = "INSERT INTO `disciplina`(`nome`, `periodo`, `idPreRequisito`, `creditos`) VALUES ('$nome','$periodo','$preRequisito','$credito')";

    $result = $conn->query($sql);
    
    if ($result == true) {
        echo "<p>Disciplina Criada</p>";
    } else {
        echo "<p>Falha na Criação</p>";
    }
}

?>