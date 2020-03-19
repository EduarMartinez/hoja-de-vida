<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoja de vida 3</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos2.css">
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
     //llamado para la tabla habilidades
     $SQLHabilidades="select * from habilidades where candidato_id = ". $_GET['id'];
     $filasHabilidades=$conexion->query($SQLHabilidades);
     ?>
     <?php 
     //llamado para la tabla contactos
     $SQLContactos="select * from contactos where candidato_id = ". $_GET['id'];
     $filasContactos=$conexion->query($SQLContactos);
     ?>


</head>

<body>
    <div class="container">

        <header>
            <div class="row">
                <div class="inf">
                    <div class="col-xs-12  hidden-md col-lg-4">
                        <div class="imagen">
                            <figure class="figure">
                                <img  src="<?php echo $fila['foto']; ?>" class="figure-img img-fluid rounded" alt=""
                                    style="width: 50%; border-radius: 50%;">
                             </figure>
                        </div>
                    </div>

                    <div class="col-xs-12   col-md-12 col-lg-8">
                        <div class="nombre">
                            <h1><?php echo $fila['nombres']." ".$fila['apellidos']; ?> <i class="fa fa-address-book" aria-hidden="true"></i> </h1>
                            <h3><?php echo $fila['profesion']; ?></h3>

                            <center>
                                <?php echo $fila['acerca']; ?>
                            </center>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">

                <h4 class="relleno">Habilidades  <i class="fa fa-cogs "></i></i></h4>
                <p>
                    <?php  ?>
                    <?php 
                     $colores= array("info","primary","success","warning","danger","secondary");
                     $i=0;
                    foreach ($filasHabilidades as $filasHabilidades){?>
                        <div class="habilidad " style="font-size: 25px;">
                        <?php echo $filasHabilidades['habilidad'];  ?> 
                        </div>
                        <div class="porcentaje">
                        <div class="progress-bar bg-<?php echo $colores[$i];?>" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php echo $filasHabilidades['porcentaje'],"%"; ?> "> <?php echo $filasHabilidades['porcentaje']." %"; ?> 
                            <span class="sr-only">80% Complete (warning)</span>
                        </div>
                        </div>
                        <br>
                    <?php $i++; }?>
                </p>
                <hr/>
                <h4 class="relleno-ama">Lenguajes <i class="fa fa-users"></i></i></h4>
                <?php 
                $coloresi=array ("info","primary","success","warning","danger","secondary");
                $e=0;
                foreach ($filasIdiomas as $filasIdiomas){?>
                    <div class="idioma">
                    <?php echo $filasIdiomas['idioma'];  ?>
                    </div>
                    <div class="porcentaje">
                    <div class="progress-bar bg-<?php echo $coloresi[$e]; ?>" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                        style="width: <?php echo $filasIdiomas['porcentaje']."%"; ?>">  <?php echo $filasIdiomas['porcentaje']."%"; ?>
                        
                    </div>
                    </div>
                 <?php $e++; }?>
                <hr/>
                <h4 class="relleno-ama">Contactos <i class="fa fa-users"></i></i></h4>
                    
                <?php foreach($filasContactos as $filasContactos) {?>
                    <div class="row" style="background:rgba(129, 221, 175, 0.212); margin: 3px;color: white;width: 100%;padding: 5px;">
                        <div class="col-md-3 text-center" >
                            <i class="fa <?php echo $filasContactos['tipo'];?> fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-9 text-center">
                        <?php echo $filasContactos['descripcion'];?> 
                        </div>
                    </div>
                  
                    
                <?php }?>
                <br>
       
                
                <div class="cualidades">
                    <h4 class="relleno">Cualidades <i class="fa fa-bar-chart"></i></h4>
                    <?php foreach ($filascualidad as $filascualidad){?>
                        <div class="row">
                                <div class="col-md-8 ">
                            <?php echo  $filascualidad['cualidad'];?>  
                                </div>
                                <div class="col-md-4">
                                        <i class="fa fa-bar-chart fa-2x" style="color: rgb(0, 255, 255);"> </i>
                                </div>
                        </div>
                    <?php }?>
                </div>
            </div>


            <div class="col-xs-12 col-sm-8 col-md-8">
                    
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
             

                <hr/>
                <div class="educacion">
                    <h2>Educación</h2>
                    <?php foreach($filasEducacion as $filasEducacion){   ?>
                        <div class="row" style="margin: 3px;">
                            <div class="col-md-8">
                                <h5> <?php echo $filasEducacion['institucion'];?><br></h5>
                                <p>   <?php echo $filasEducacion['titulo'];?><br></p>
                             
                            </div>
                            <div class="col-md-4">
                                    <div class="star text-center">
                                            <i>    <i style="font-size: 35px;" class="strella"> <i class="fa fa-star" aria-hidden="true"></i> </i>
                                             <br> <div class="inicio-final"><?php echo $filasEducacion['inicio'];?> __  <?php echo $filasEducacion['final'];?></div>
                                        </div>
                            </div>
                        </div>
                        <hr style=" border-color:white;">

                    <?php } ?> 

                </div>
                <div class="experiencia">
                    <h2>Experiencia</h2>
                    <p>
                            <?php foreach($filasExperiencia as $filasExperiencia){   ?>
                                <div class="row" style="margin: 5px;background: rgba(36, 99, 99, 0.329);">
                                    <div class="col-md-8">
                                        <h5> <?php echo $filasExperiencia['cargo'];?><br></h5>
                                        <p>   <?php echo $filasExperiencia['descripcion'];?><br></p>
                                     
                                    </div>
                                    <div class="col-md-4">
                                            <div class="star text-center">
                                                    <i>    <i style="font-size: 35px;" class="strella"> <i class="fa fa-bolt" aria-hidden="true"></i>   </i>
                                                     <br> <div class="inicio-final"><?php echo $filasExperiencia['inicio'];?> __  <?php echo $filasExperiencia['final'];?></div>
                                                </div>
                                    </div>
                                </div>
                            
        
                            <?php } ?> 
                    </p>
                </div>
               
                        <h4 class="relleno">Intereses  <i class="fa fa-gamepad"></i></h4>
                <div class="interes text-center">
                    <?php
                    foreach($filasPasatiempo as $filasPasatiempo){
                    ?>                         
                                <figure class="figure">
                                        <img src="<?php echo $filasPasatiempo['pasatiempo']; ?>" class="figure-img img-fluid rounded" alt=""
                                            style="width: 120%; border-radius: 5px;">
                                </figure>
                                            
                    <?php }?>
                    <hr/>
                </div>

                </div>
            </div>
        </div>
    </div>

   





    <script src="js/jquery.js">

    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>