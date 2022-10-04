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

        $dir = "./";
        $arquivo = $dir . basename($_FILES["uploadArq"]["name"]);
        $uploadOk = 1;
        $tipoArq = pathinfo($arquivo,PATHINFO_EXTENSION);

        if($tipoArq != "txt" ) {
            echo "Insira um arquivo texto!";
            $uploadOk = 0;
        }

        if ($uploadOk != 0) {
            $arq = fopen($_FILES["uploadArq"]["name"], 'r');
            while ( ($linha = fgets($arq)) !== false){
            $dados=explode(";", $linha);
            $sql = "INSERT INTO `usuario`(`nome`, `email`, `senha`, `tipo`, `perfil`) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]')";
            $result = $conn->query($sql);
            }
            
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Arquivo Usuario AV1</title>
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
    <form action="usuarioArquivo.php" method="POST" enctype="multipart/form-data" >
        <p>Insira o arquivo de texto com os usuários</p>
        <input type="file" name="uploadArq" id="uploadArq"><br>
        <input type="submit" value="Enviar" name="submit">
    </form>
</body>
</html>