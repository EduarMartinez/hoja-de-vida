<?php
include 'conexion.php';
$respuesta=array('error'=> false);
$accion="lectura";
if (isset($_GET['accion']))
{
    $accion=$_GET['accion'];
}
switch ($accion) {
     case 'crear':
    
        $identidad    =$_POST['identidad'];
        $nombres      =$_POST['nombres'];
        $apellidos    =$_POST['apellidos'];
        $profesion    =$_POST['profesion'];
        $sexo         =$_POST['sexo'];
        $fechanac     =$_POST['fechanac'];
        $estadocivil  =$_POST['estadocivil'];
        $pareja       =$_POST['pareja'];
        $nacionalidad =$_POST['nacionalidad'];
        $direccion    =$_POST['direccion'];
        $acerca       =$_POST['acerca'];

        $target_path = "img/";
$target_path = $target_path . basename( $_FILES['foto']['name']); 
$foto=$target_path; 
if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
    $SQL="insert into candidatos(identidad,nombres,apellidos,profesion,sexo,fechanac,estadocivil, pareja, 
        nacionalidad,direccion, acerca, foto) values ('$identidad','$nombres','$apellidos','$profesion','$sexo','$fechanac','$estadocivil',
        '$pareja','$nacionalidad','$direccion','$acerca','$foto')";
        
        if ($conexion->query($SQL)===TRUE)
        {
            $respuesta['message']="Los datos de $nombres $apellidos los puede verificar en la lista siguiente.";
        }
        else
        {
            $respuesta['error']=TRUE;
            $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
        }
} 
    else{
        $respuesta['error']=TRUE;
            $respuesta['message']="<h1> Ha ocurrido un error al subir el archivo, trate de nuevo! </h1>";
             echo "";
        }

       


        break;


     case 'actualizar':
        $id           =$_POST['id'];
        $identidad    =$_POST['identidad'];
        $nombres      =$_POST['nombres'];
        $apellidos    =$_POST['apellidos'];
        $profesion    =$_POST['profesion'];
        $sexo         =$_POST['sexo'];
        $fechanac     =$_POST['fechanac'];
        $estadocivil  =$_POST['estadocivil'];
        $pareja       =$_POST['pareja'];
        $nacionalidad =$_POST['nacionalidad'];
        $direccion    =$_POST['direccion'];
        $acerca       =$_POST['acerca'];
        $foto         =$_POST['foto'];
        $SQL="update candidatos set  identidad='$identidad',nombres='$nombres',apellidos='$apellidos',profesion='$profesion',sexo='$sexo',fechanac='$fechanac',estadocivil='$estadocivil', pareja='$pareja', 
        nacionalidad='$nacionalidad',direccion='$direccion', acerca='$acerca', foto='$foto' where id= $id";

        if ($conexion->query($SQL)===TRUE)
        {
            $respuesta['message']="Los datos de $nombres $apellidos los puede verificar en la lista siguiente.";
        }
        else
        {
            $respuesta['error']=TRUE;
            $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
        }

        break;
     case 'eliminar':
        $id           =$_POST['id'];
        $nombres      =$_POST['nombres'];
        $apellidos    =$_POST['apellidos'];
     
        $SQL          ="delete from candidatos where id= $id";

        if ($conexion->query($SQL)===TRUE)
        {
            $respuesta['message']="Los datos de $nombres $apellidos ya no aparacen en la lista siguiente.";
        }
        else
        {
            $respuesta['error']=TRUE;
            $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
        }
      break;

     case 'lectura':
        $filas=$conexion->query("select * from candidatos");
        $candidatos=array ();
        foreach ($filas as $fila) 
        {
            array_push($candidatos,$fila);

        }
        $respuesta ['candidatos']=$candidatos;
        break;

    
    default:
        # code...
        break;
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>