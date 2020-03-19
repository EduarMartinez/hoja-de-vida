
 <?php
   $conexion= new mysqli("localhost","root","","hojadevida");
  if ($conexion->connect_error)
   {
      die("Error en la conexion establecida" .$conexion->connect_error);
   }

?>