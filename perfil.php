<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil del usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <br>
    <div class="container">
        <?php
        //incluimos la conexion y traemos los datos de la tabla candidatos para usarlos
        include 'conexion.php';
        $SQL="select * from candidatos where id = ". $_GET['id'];
        $resultado=$conexion->query($SQL);
        $fila=$resultado->fetch_assoc();
        ?>
        <div class="row">
            <div class="col-md-4">
                <!--de esta manera subtraemos la foto del usuario -->
                <figure class="figure">
                    <img src="<?php echo $fila['foto']; ?>" class="figure-img img-fluid rounded" alt=""
                        style="width: 100%; border-radius: 5px;">
                    <figcaption class="figure-caption text-center"> Foto de perfil de la hoja de vida de
                        <?php echo $fila['nombres']; ?> </figcaption>
                </figure>
            </div>
            <div class="col-md-8">
                <div class="card" style="width:100%; background:#A9E2F3;" v-for="candidato in candidatos">
                    <div class="card-header bg-info text-white">
                        <h3> <?php echo "Perfil de informacion para ". $fila['nombres']." " .$fila['apellidos'];?> </h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Traemos los datos personales del candidato mediante codigo php-->
                            <div class="col-md-3">
                                <h6>Identidad</h6>
                            </div>
                            <div class="col-md-3"><?php echo $fila['identidad'];?></div>
                            <div class="col-md-3">
                                <h6>Nombres:</h6>
                            </div>
                            <div class="col-md-3"><?php echo $fila['nombres'];?></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Apellidos</h6>
                            </div>
                            <div class="col-md-3"><?php echo $fila['apellidos'];?></div>
                            <div class="col-md-3">
                                <h6>F.nacimiento</h6>
                            </div>
                            <div class="col-md-3"><?php echo $fila['fechanac'];?></div>
                        </div>
                    </div>
                    <!--Fin del card-->
                </div>


                <div class="card">

                    <div class="car-body">

                        <!--Iconos -->
                        <div class="row" style="margin: 20px;">

                            <div class="col-md-2">
                                <div class="bg-info text-center" style="color: antiquewhite; border-radius: 10px;">
                                    <a href="contactos.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/contactos1.png" alt="" style="width: 70%;">
                                    </a>
                                    Contactos
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center" style="color: antiquewhite; border-radius: 10px;">
                                    <a href="idiomas.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/idiomas1.png" alt="" style="width: 70%;">
                                    </a>
                                    Idiomas
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center" style="color: antiquewhite; border-radius: 10px;">
                                    <a href="habilidades.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/habilidades.png" alt="" style="width: 70%;">
                                    </a>
                                    Habilidades
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center" style="color: antiquewhite; border-radius: 10px;">
                                    <a href="experiencias.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/experiencia.png" alt="" style="width: 70%;">
                                    </a>
                                    Experiencia
                                </div>


                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center" style="color: antiquewhite; border-radius: 10px;">
                                    <a href="educacion.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/educacion.png" alt="" style="width: 70%;">
                                    </a>
                                    Educación
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center" style="color: antiquewhite; border-radius: 10px;">
                                    <a href="cualidades.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/cualidades.png" alt="" style="width: 70%;">
                                    </a>
                                    Cualidades
                                </div>

                            </div>
                        </div>

                        <div class="row" style="margin: 20px;">
                            <div class="col-md-2">
                                <div class="bg-info text-center"
                                    style="color: antiquewhite; border-radius: 10px; font-size: 13px;padding: 2px;">
                                    <a href="pasatiempos.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/Pasatiempos.png" alt="" style="width: 73%; ">
                                    </a>
                                    Pasatiempos
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center"
                                    style="color: antiquewhite; border-radius: 10px; padding: 2px;">
                                    <a href="formato1.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/icv.png" alt="" style="width: 70%;">
                                    </a>
                                    CV-1
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center"
                                    style="color: antiquewhite; border-radius: 10px; padding: 2px;">
                                    <a href="formato2.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/IIcv.png" alt="" style="width: 70%;">
                                    </a>
                                    CV-2
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="bg-info text-center"
                                    style="color: antiquewhite; border-radius: 10px; padding: 2px;">
                                    <a href="formato3.php?id=<?php echo $fila['id'];?>">
                                        <img src="img/IIIcv.png" alt="" style="width: 70%;">
                                    </a>
                                    CV-3
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="bg-danger text-center"
                                    style="color: antiquewhite; border-radius: 10px; padding: 2px;">
                                    <a href="">
                                        <img src="img/salida.png" alt="" style="width: 70%;">
                                    </a>
                                    Volver
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>

        </div>





    </div>
</body>

</html>