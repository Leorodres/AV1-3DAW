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
        <div><a style="margin-right: 25px" href="./criarDisciplina.php">Criar Matricula</a> <a style="margin-right: 25px" href="./alterarDisciplina.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="./apagarDisciplina.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="./exibirDisciplina.php">Exibir</a><a style="margin-right: 25px" href="./exibirTodasDisciplinas.php">Exibir Todas</a></div>    </div>

        <br>
        <form action="exibirTodasDisciplinas.php" method="POST">

            <table>
                <tr>
                    <td>Matricula</td>
                    <td>Nome</td>
                    <td>Email</td>
                </tr>
            </tr>
            <?php
            if($boolTest==true){
                while ($row = mysqli_fetch_row($resposta)) { 

                    $matExib = $row[0];
                    $nomeExib = $row[1];
                    $emailExib = $row[2];
            
                    echo "<tr><td>$matExib</td>
                    <td>$nomeExib</td>
                    <td>$emailExib</td> </tr>";
                }
            }
            ?>
            </table>
        </form>
    </body>
</html>