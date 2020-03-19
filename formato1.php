<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoja de vida</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hojadeestilos.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


    <?php 
     include 'conexion.php';
     //llamado para la tabla candidatos
     $SQL="select * from candidatos where id = ". $_GET['id'];
     $resultado=$conexion->query($SQL);
     $fila=$resultado->fetch_assoc();
     ?>
        <?php 
     //llamado para la tabla educacion
     $SQLeducacion="select * from educaciones where candidato_id = ". $_GET['id'];
     $filasEducacion=$conexion->query($SQLeducacion);
     ?>
     <?php 
     //llamado para la tabla experiencia
     $SQLexperiencia="select * from experiencias where candidato_id = ". $_GET['id'];
     $filasExperiencia=$conexion->query($SQLexperiencia);
     ?>
     <?php 
     //llamado para la tabla pasatiempos
     $SQLpasatiempo="select * from pasatiempos where candidato_id = ". $_GET['id'];
     $filasPasatiempo=$conexion->query($SQLpasatiempo);
     ?>
     <?php 
     //llamado para la tabla Cualidades
     $SQLcualidad="select * from cualidades where candidato_id = ". $_GET['id'];
     $filascualidad=$conexion->query($SQLcualidad);
     ?>
     <?php 
     //llamado para la tabla idiomas
     $SQLidiomas="select * from idiomas where candidato_id = ". $_GET['id'];
     $filasIdiomas=$conexion->query($SQLidiomas);
     ?>
     <?php 
     //llamado para la tabla idiomas
     $SQLHabilidades="select * from habilidades where candidato_id = ". $_GET['id'];
     $filasHabilidades=$conexion->query($SQLHabilidades);
     ?>
     <?php 
     //llamado para la tabla idiomas
     $SQLContactos="select * from contactos where candidato_id = ". $_GET['id'];
     $filasContactos=$conexion->query($SQLContactos);
     ?>

</head>

<body>

    <div class="container" style="  border: 1px solid darkgray;margin: 0 auto;   padding: 10px;   background: rgb(9, 67, 80);  color: white;">
        <div class="row">
            <header class="col-xs-12   col-md-3">
                <div class="inf">
                    <div class="imagen">
                    <figure class="figure">
                        <img src="<?php echo $fila['foto']; ?>" class="figure-img img-fluid rounded" alt=""
                            style="width: 100%; border-radius: 5px;">
                  </figure>
                       
                    </div>

                </div>
                
                <div class="cont-head">
                    <div class="programas">

                        <h4><i class="fa fa-bar-chart"></i> Cualidades </h4>
                        <div class="row">
                            <?php
                                foreach($filascualidad as $filascualidad){
                            ?>
                            <div class="col-md-8 ">
                           <?php echo  $filascualidad['cualidad'];?>  
                            </div>
                            <div class="col-md-4">
                                    <i class="fa fa-bar-chart" style="color: gold;"> </i>
                            </div>
                                <?php }?>

                        </div>  
                        <hr style="border:10px;">
                    </div>
                   

                    <div class="idiomas">
                        <h4><i class="fa fa-users"></i> Idiomas</h4>
                        <div class="row text-center" style="width: 100%;">
                            <div class="col-md-6" style="font-size:20px;"><strong>Idioma</strong></div>
                            <div class="col-md-6" style="font-size:20px;"><strong>Dominio</strong></div>
                        </div>
                        <?php
                        foreach($filasIdiomas as $filasIdiomas){
                            ?>
                       
                        <div class="row" style="background:rgb(9, 67, 80);margin-bottom: 5px;color: white;width: 106%;padding: 5px;margin-left: -14px; ">
                            <div class="col-md-6">
                                <?php echo $filasIdiomas['idioma']; ?>
                            </div>
                            <div class="col-md-6 text-center">
                                <?php echo $filasIdiomas['porcentaje']." %"; ?>
                            </div>
                        </div>
                                <?php }?>
                                <hr style=" border-color:white;">
                    </div>

                    <div class="Habilidades">
                        <h4> <i class="fa fa-cogs "></i> Habilidades</h4>
                        <div class="row">
                            <div class="col-md-7 text-center" style="font-size:20px;"><strong>Habilidad</strong></div>
                            <div class="col-md-5  text-center" style="font-size:20px;"><strong>Dominio</strong></div>
                        </div>
                        <?php
                            foreach($filasHabilidades as $filasHabilidades){?>
                                <div class="row" style="">
                                    <div class="col-md-7 text-center">
                                        <?php echo $filasHabilidades['habilidad']; ?>
                                    </div>
                                    <div class="col-md-5 text-center">
                                        <?php echo $filasHabilidades['porcentaje']." %"; ?>
                                    </div>
                                    <hr style=" border-color:white;">
                                </div>
                               
                         <?php }?>

                    </div>
                </div>
                <hr style=" border-color:white;">
                <div class="redes">
                    <div class="list-group">
                        <h4><i class="fa fa-phone-square" aria-hidden="true"></i> Contactos</h4>
                        <?php
                            foreach($filasContactos as $filasContactos){?>
                                <div class="row" style="background:rgb(9, 67, 80); margin: 3px;color: white;width: 107%;padding: 5px;margin-left: -14px;">
                              
                                    <div class="col-md-3 text-center" >
                                        <i class="fa <?php echo $filasContactos['tipo'];?> fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md-9 text-center">
                                    <?php echo $filasContactos['descripcion'];?> 
                                    </div>
                              
                                        
                                </div>
                                
                         <?php }?>
                    </div>
                </div>
            </header>

             <section class="col-xs-12 col-sm-12 col-md-9">
                    <div class="nombre">
                       <?php echo $fila['nombres']." ".$fila['apellidos']; ?>
                        <h1>  <?php echo $fila['profesion']; ?></h1>
                       
                    </div>
                    <div class="contenido">
                        <h2 class="titulo"><i class="fa fa-user-circle-o"></i> QUIEN SOY</h2>
                        <p>
                            <?php echo $fila['acerca']; ?>
                        </p>
                    </div>
                    <div class="contenido">
                        <h2 class="titulo"> <i class="fa fa-address-card"></i> Datos Personales </h2>
                        <div class="row">


                            <div class="col-xs-6 col-sm-6 col-md-6"> 
                                <h5>Identidad:</h5>
                              <?php echo $fila['identidad']; ?> 
                              <h5>Sexo:</h5>
                              <?php echo $fila['sexo']; ?>
                              <h5>Fecha de nacimiento</h5>
                              <?php echo $fila['fechanac']; ?>
                             
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6" style="margin-bottom: 10px;">
                                <h5>Estado Civil</h5>
                                <?php echo $fila['estadocivil']; ?>
                                <h5>Nacionalidad:</h5>
                                <?php echo $fila['nacionalidad']; ?>
                                <h5>Direccion:</h5>
                                <?php echo $fila['direccion']; ?>
                                

                            </div>


                        </div>
                    </div>
                    <div class="contenido">
                        <h2 class="titulo"> <i class="fa fa-graduation-cap"></i> Educación</h2>
                        
                            
                            <?php
                                foreach($filasEducacion as $filaEducacion){
                            ?>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-3">
                                    Inicio: <br> Final: <br> Institución: <br> Titulo: <br><br>



                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-9">
                                <?php echo $filaEducacion['inicio'];?><br>
                                <?php echo $filaEducacion['final'];?><br>
                                <?php echo $filaEducacion['institucion'];?><br>
                                <?php echo $filaEducacion['titulo'];?><br>
                                </div>
                            </div> 
                           
                                <?php }?>
                        
                       
                    </div>
                    <div class="contenido">
                        <h2 class="titulo"> <i class="fa fa-area-chart"></i> EXPERIENCIA</h2>
              
                                <?php
                                    foreach($filasExperiencia as $filasExperiencia){
                                ?>
                            <div class="row">
                                 <div class="col-xs-4 col-sm-4 col-md-3">
                                    Inicio: <br> Final: <br> Cargo: <br> Descripcion: <br><br>
    
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-9">
                                <?php echo $filasExperiencia['inicio'];?><br>
                                <?php echo $filasExperiencia['final'];?><br>
                                <?php echo $filasExperiencia['cargo'];?><br>
                                <?php echo $filasExperiencia['descripcion'];?><br>
                                </div> 
                            </div>  
                                
                                    <?php }?>
                                
                                  
                                <br>

                        </div>
                    </div>
                    <div class="contenido text-center">
                        <h2 class="titulo" style="text-align: center;"> <i class="fa fa-gamepad"></i> PASATIEMPOS</h2>
                        <p>
                            <?php
                            foreach($filasPasatiempo as $filasPasatiempo){
                            ?>
                            <figure class="figure">
                                <img src="<?php echo $filasPasatiempo['pasatiempo']; ?>" class="figure-img img-fluid rounded" alt=""
                                    style="width: 100%; border-radius: 5px;">
                            </figure>
                            <?php }?>
                        </p>
                    </div>
        </section>



        </div>
    </div>


    <script src="js/jquery.js">
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>