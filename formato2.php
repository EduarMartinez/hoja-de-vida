<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoja de vida 2</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos1.css">
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
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <figure class="figure">
                            <img  src="<?php echo $fila['foto']; ?>" class="figure-img img-fluid rounded" alt=""
                                style="width: 50%; border-radius: 50%; margin-left: 30px;    margin-top: 20px;background:#0B2F3A ;padding: 20px;">
                         </figure>

                    </div>
                   

                    <div class="col-xs-12 col-sm-8  col-md-8">
                        <div class="nombre text-center" >
                            <h1><?php echo $fila['nombres'].$fila['apellidos'];?> <i class="fa fa-address-book" aria-hidden="true"></i> </h1>
                            <h3><?php echo $fila['profesion'];?> </h3>

                            <?php echo $fila['acerca'];?> 
                          
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h4>Contactos  <i class="fa fa-phone-square" aria-hidden="true"></i></h4>
                <?php foreach($filasContactos as $filasContactos) {?>
                    <div class="row" style="background:rgb(9, 67, 80); margin: 3px;color: white;width: 100%;padding: 5px;">
                        <div class="col-md-3 text-center" >
                            <i class="fa <?php echo $filasContactos['tipo'];?> fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-9 text-center">
                        <?php echo $filasContactos['descripcion'];?> 
                        </div>
                    </div>
                    
                <?php }?>

                <hr/>
                <h4>Idiomas <i class="fa fa-users"></i></h4>
                 <?php foreach ($filasIdiomas as $filasIdiomas){?>
                    <div class="idioma">
                    <?php echo $filasIdiomas['idioma']; ?>
                    </div>
                    <div class="porcentaje">
                    <div class="progress-bar progress-bar-succes" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                        style="width: <?php echo $filasIdiomas['porcentaje']."%"; ?>">  <?php echo $filasIdiomas['porcentaje']." %"; ?>
                        
                    </div>
                    </div>
                 <?php }?>

                <hr/>
                <h4>Habilidades <i class="fa fa-cogs "></i></h4>
                <?php foreach ($filasHabilidades as $filasHabilidades){?>
                    <div class="habilidad">
                    <?php echo $filasHabilidades['habilidad']; ?> 
                    </div>
                    <div class="porcentaje">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                        style="width: <?php echo $filasHabilidades['porcentaje'],"%"; ?> "> <?php echo $filasHabilidades['porcentaje']." %"; ?> 
                        <span class="sr-only">80% Complete (warning)</span>
                    </div>
                    </div>
                <?php }?>
                <hr/>
                <div class="cualidades">
                    <h4>Cualidades <i class="fa fa-bar-chart"></i></h4> 
                    <?php foreach ($filascualidad as $filascualidad){?>
                        <div class="row">
                                <div class="col-md-8 ">
                            <?php echo  $filascualidad['cualidad'];?>  
                                </div>
                                <div class="col-md-4">
                                        <i class="fa fa-bar-chart" style="color: gold;"> </i>
                                </div>
                        </div>
                    <?php }?>
                </div>
                <br>
                <h4 class="relleno"> Pasatiempos <i class="fa fa-gamepad"></i> </h4>
        
                        <?php
                        foreach($filasPasatiempo as $filasPasatiempo){
                        ?>                         
                                    <figure class="figure">
                                            <img src="<?php echo $filasPasatiempo['pasatiempo']; ?>" class="figure-img img-fluid rounded" alt=""
                                                style="width: 100%; border-radius: 5px;">
                                    </figure>
                                                
                        <?php }?>

                


            </div>
         
            <div class="col-xs-12 col-sm-8 col-md-8">
                    <br><br>
                <h4 class="relleno">Información personal  <i class="fas fa-award"></i></h4>
                <p>
                
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

                </p>
                <h4 class="relleno">Educación <i class="fa fa-graduation-cap"></i></h4>
                <p>

                              
                             <?php foreach($filasEducacion as $filaEducacion){?>
                                <div class="row" style="background: #0B2F3A; width:100%; margin: 3px;">
                                    <div class="col-md-3">
                                        Inicio: <br> Final: <br> Institución: <br> Titulo: <br><br>
                                    </div>
                                    <div class="col-md-9" style="background: ">
                                    <?php echo $filaEducacion['inicio'];?><br>
                                    <?php echo $filaEducacion['final'];?><br>
                                    <?php echo $filaEducacion['institucion'];?><br>
                                    <?php echo $filaEducacion['titulo'];?><br>
                                    </div>
                                </div> 
                           
                             <?php }?>

                </p>
                <h4 class="relleno"> Experiencia Laboral <i class="fa fa-area-chart"></i> </h4>
                <p>
                        <?php foreach($filasExperiencia as $filasExperiencia){ ?>
                            <div class="row" style="background: #0B2F3A; width:100%; margin: 3px;" >
                                <div class="col-md-3">
                                    Inicio: <br> Final: <br> Cargo: <br> Descripcion: <br><br>

                                </div>
                                <div class=" col-md-9">
                                <?php echo $filasExperiencia['inicio'];?><br>
                                <?php echo $filasExperiencia['final'];?><br>
                                <?php echo $filasExperiencia['cargo'];?><br>
                                <?php echo $filasExperiencia['descripcion'];?><br>
                                </div> 
                            </div>  
                    
                        <?php }?>
                </p>
         
            </div>

        </div>
    </div>





    <script src="js/jquery.js">

    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>