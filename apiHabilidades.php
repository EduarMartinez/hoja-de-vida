<?php
include 'conexion.php';
$respuesta=array('error'=> false);
$accion="lectura";
$candidatos_id=0;
if (isset($_GET['accion']))
{
    $accion=$_GET['accion'];
}
if (isset($_GET['id']))
{
    $candidato_id=$_GET['id'];
}
switch ($accion) {
    case 'crear':
                                
            $habilidad       =$_POST['habilidad'];
            $porcentaje      =$_POST['porcentaje'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into habilidades (habilidad, porcentaje, candidato_id) values ('$habilidad','$porcentaje','$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $habilidad los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':

            $id              =$_POST['id'];
            $habilidad       =$_POST['habilidad'];
            $porcentaje      =$_POST['porcentaje'];
        
            $SQL="update habilidades set  habilidad='$habilidad',porcentaje='$porcentaje' where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $habilidad los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id              =$_POST['id'];
            $habilidad       =$_POST['habilidad'];
            $porcentaje      =$_POST['porcentaje'];
        
            $SQL          ="delete from habilidades where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $habilidad ya no aparacen en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
        break;
    case 'lectura':
        $filas=$conexion->query("select * from habilidades where candidato_id = $candidato_id");
        $habilidades=array ();
        foreach ($filas as $fila) 
        {
            array_push($habilidades,$fila);

        }
        $respuesta['habilidades']= $habilidades;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>