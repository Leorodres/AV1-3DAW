<?php
    $servidor="localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados="av1daw";
    $vazio=false;
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["idDiscip"];
        $nome = $_POST["nome"];
        $periodo = $_POST["periodo"];
        $preRequisito= $_POST["preRequisito"];
        $credito= $_POST["credito"];

        
        $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
        if(empty($nome) && empty($periodo)&& empty($preRequisito) &&empty($credito))
        {
            $vazio = true;
        }
        else{ if(empty($nome)){
                    $sql = "UPDATE `disciplina` SET `periodo` = '$periodo',`preRequisito`='$preRequisito',`creditos`='$credito' WHERE `idDisciplina`= $id";
                }
            else {
                if(empty($periodo)){
                    $sql = "UPDATE `disciplina` SET `nome`='$nome',`preRequisito`='$preRequisito',`creditos`='$credito' WHERE `idDisciplina`= $id";
                }
                else {
                    if(empty($preRequisito)){
                        $sql = "UPDATE `disciplina` SET `nome`='$nome',`creditos`='$credito' WHERE `idDisciplina`= $id";
                    }
                        else {
                            if(empty($credito)){
                            $sql = "UPDATE `disciplina` SET `nome`='$nome',`preRequisito`='$preRequisito' WHERE `idDisciplina`= $id";
                        }
                        else
                        {
                            $sql = "UPDATE `disciplina` SET `nome`='$nome',`periodo`='$periodo',`preRequisito`='$preRequisito',`creditos`='$credito' WHERE `idDisciplina`= $id";
                        }
                    }
                }
            }
        }
            if(!$conn->query($sql)){
                echo("Error Description: ". $conn->error);
            }
            $result = $conn->query($sql);
        }   
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Alterar AV1</title>
    </head>
    <body>
        <form action="alterarDisciplina.php" method="POST" class="formulario">
            <label for="idDiscip">Id da disciplina ser alterado:</label><br>
            <input type="text" name="idDiscip"><br>
        
            <label for="nome">Nome novo:</label><br>
            <input type="text" name="nome"><br>

            <label for="periodo">Periodo novo:</label><br>
            <input type="text" name="periodo"><br>

            <label for="preRequisito">Pre-requisito novo:</label><br>
            <input type="text" name="preRequisito"><br>

            <label for="credito">Credito novo:</label><br>
            <input type="text" name="credito"><br>

            <input class="botao" type="submit" value="Enviar">
        </form>
        <?php if($vazio){echo "<p> Preencha pelo menos um dos campos! </p>";} ?> 
    </body>
</html>