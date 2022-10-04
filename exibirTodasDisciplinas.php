<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "av1daw";



$conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($conn->connect_error) {
    die("Conexao com o banco de dados falhou!!!");
}
$sql = "SELECT * FROM `disciplina`";

if ($resposta = mysqli_query($conn, $sql)) { 
    $boolTest=true;
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exibir Todas AV1</title>
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
        <form action="exibirTodasDisciplinas.php" method="POST">

            <table>
                <tr>
                    <td>Nome da disciplina</td>
                    <td>Id Da disciplina</td>
                    <td>Id do pre-requisito</td>
                    <td>Periodo</td>
                    <td>Credito</td>
                </tr>
            </tr>
            <?php
            if($boolTest==true){
                while ($row = mysqli_fetch_row($resposta)) { 

                    $nome = $row[0];
                    $id = $row[1];
                    $periodo = $row[2];
                    $idPreRequisito = $row[3];
                    $creditos = $row[4];
                
                    echo "<tr><td>$nome</td>
                    <td>$id</td>
                    <td>$periodo</td>
                    <td>$idPreRequisito</td>
                    <td>$creditos</td> </tr>";
                }
            }
            ?>
            </table>
        </form>
    </body>
</html>