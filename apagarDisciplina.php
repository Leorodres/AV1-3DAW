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
    <title>Apagar Disciplina AV1</title>
    
</head>
<body>
    <div>
    <div><a style="margin-right: 25px" href="./criarDisciplina.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterarDisciplina.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagarDisciplina.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibirDisciplina.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodasDisciplinas.php">Exibir Todas</a></div>    </div>

<br>
    <form action="apagarDisciplina.php" method="POST">

    <label for="idDiscip">Digite o ID: </label>
    <input type="text" name="idDiscip"><br>


    <input name="botao" type="submit" value="Excluir">

    </form>
</body>
</html>

<?php
    if (isset($_POST["botao"])) {
        
        $id = $_POST["idDiscip"];
        
        $sql = "DELETE FROM `disciplina` WHERE `idDisciplina`= $id ";

        $resultado = $connection -> query($sql);


        if($resultado == true){
            echo "<p>Disciplina Apagada</p>"; 
        }
        else{
            echo "<p>Algum Erro Ocorreu</p>";
        }

    }

?>