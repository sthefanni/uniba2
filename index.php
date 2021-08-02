<?php
    include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="CSS/index.css" rel="stylesheet">
    <title>Teste: UniBA</title>


</head>
<body>
    
    <div id="conteudo">
        <h1>Pesquise sua Instituições</h1>
        <form method="POST" action="Receber.php">

            <label>Público/Privado:</label>
            <select name= "tipoEnsino">
                <option value="">Tipos de Faculdade</option>
                <?php
                    $gettipos = "SELECT DISTINCT tipoEnsino FROM Instituicao";
                    $gettipos_query = mysqli_query($con, $gettipos);
                    while($gettipos_row = mysqli_fetch_array($gettipos_query)) {
                        $tipo = $gettipos_row['tipoEnsino'];
                        
                        echo "<option> $tipo </option> ";
                    } 

                ?>
            </select> 

            <label>Instituição:</label>
            <input type="text" name="pesquisar" placeholder="Pesquisar">

            <label>Cursos:</label>
            <select name="cursos">
                <option value="">Escolha</option>
                <?php
                $getcursos = "SELECT * FROM curso";
                $getcursos_query = mysqli_query($con, $getcursos);
                while($getcusos_row = mysqli_fetch_array($getcursos_query)) {
                    $cursos = $getcusos_row['nomeCurso'];
                    $cursos_id = $getcusos_row['codCurso'];

                    echo "<option value = $cursos_id> $cursos </option>"; 
                } 
                ?>
            </select> 
            
             <label>Municípios:</label>
            <select name="cidades">
                <option value="">Selecione</option> 
                <?php
                 $getcidades = "SELECT DISTINCT municipio FROM instituicao";
                $getcidades_query = mysqli_query($con, $getcidades);
                while($getcidades_row = mysqli_fetch_array($getcidades_query)) {
                    $cidades = $getcidades_row['municipio'];

                    echo "<option> $cidades </option>";

                } 
                ?>   
            </select> 

            <input type="submit" value="ENVIAR">
            
        </form>
        
    </div>

    

</body>
</html>
