<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "av1daw";
$nome = "";
$id = "";
$periodo = "";
$idPreRequisito = "";
$creditos = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($connection->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }

    if (isset($_POST["botao"])) {
        $id = $_POST["idDiscp"]; 
        
        $sql = "SELECT * FROM `disciplina` WHERE `idDisciplina` = $id "; 

        if ($result = mysqli_query($connection, $sql)) { 
            while ($row = mysqli_fetch_row($result)) { 
                $nome = $row[0];
                $id = $row[1];
                $periodo = $row[2];
                $idPreRequisito = $row[3];
                $creditos = $row[4];
            }
        }
        else{
            echo "<p>Id Invalido!</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exibir Disciplina AV1</title>
    <link rel="stylesheet" href="estilo.css">
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
    <form action="exibirDisciplina.php" method="POST">

        <label for="idDiscp">Digite o ID da disciplina: </label>
        <input type="text" name="idDiscp"><br><br>


        <input name="botao" type="submit" value="Procurar">

        <?php if (isset($_POST["botao"])) {
           echo " <table>
           <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Periodo</td>
                <td>Pre-Requisito</td>
                <td>Creditos</td>            
            </tr>
            <tr>
            <td> $id </td>
            <td> $nome </td>           
            <td> $periodo </td>
            <td> $idPreRequisito </td>
            <td> $creditos </td> 
            </tr>
           </table>";
        }?>
    </form>
</body>

</html>