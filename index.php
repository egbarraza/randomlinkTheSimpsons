<?php
    session_start();

    $arrayAux = null;
    $row = -1;
    if (($handle = fopen("csv/dbcapitulos.csv", "r")) !== FALSE) {

        while (($data = fgetcsv($handle, 1000, "|")) !== FALSE) {
            $num = count($data);

            if($row != -1){
                for ($c=0; $c < $num; $c++) {
                    $arrayAux[$row][$c] = $data[$c];
                }
            }
            $row++;
        }
        fclose($handle);
    }

    $fila = random_int(0, 705);

    if(isset($_POST["guardar"])){

        $_SESSION['usuario'] = "alguno";
        $_SESSION['temporada'] = $arrayAux[$fila][0];
        $_SESSION['capitulo'] = $arrayAux[$fila][1];
        $_SESSION['titulo'] = $arrayAux[$fila][2];
        $_SESSION['link'] = $arrayAux[$fila][3];
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e3d7c25997.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cap&iacute;tulos random</title>
</head>

<body>
    <div class="text-center">
        <div class="contenedor" >
            <img src="img/tittle.png" class="imgTop"/>
            <div class="row justify-content-md-center">
                <div class="col-md-8" >
                    <span class="labelMensaje"> Seleccionamos un cap&iacute;tulo especial para ti! </br> Pero si prefieres selecciona otro ;)</span>
                    <form style="margin-top:35px" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
                        <div class="row justify-content-md-center ">
                            <div class="col-11">
                                <div class="row justify-content-md-center">
                                    <?php
                                        if (isset($_SESSION['temporada'])){
                                    ?>
                                        <span class="labelTemp">Temporada: <b><?php echo $_SESSION['temporada']; ?></b> - cap&iacute;tulo: <b><?php echo $_SESSION['capitulo']; ?> </b> </span>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-12">
                                <div class="row justify-content-md-center">
                                    <?php
                                        if (isset($_SESSION['temporada'])){
                                    ?>
                                        
                                        <span class="labelTit"><b>"<?php echo $_SESSION['titulo']; ?>" </b></span>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-md-center">
                            <div class="col-11">
                                <div class="row justify-content-md-center">
                                    <?php
                                        if (isset($_SESSION['temporada'])){
                                    ?>
                                        <span class="labelLink"><a href="<?php echo $_SESSION['link']; ?>" target="_blank"><b>Ver en Star+ </b> </a></span>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-md-center">
                            <div class="col-11">
                                <button type="submit" class="btn btnCap" name="guardar">Nuevo cap&iacute;tulo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <img src="img/sillon.png" class="imgBottom"/>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>