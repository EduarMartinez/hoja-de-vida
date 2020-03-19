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
                                
            $idioma       =$_POST['idioma'];
            $porcentaje      =$_POST['porcentaje'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into idiomas (idioma, porcentaje, candidato_id) values ('$idioma','$porcentaje','$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $idioma los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':

            $id              =$_POST['id'];
            $idioma       =$_POST['idioma'];
            $porcentaje      =$_POST['porcentaje'];
        
            $SQL="update idiomas set  idioma='$idioma',porcentaje='$porcentaje' where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $idioma los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id              =$_POST['id'];
            $idioma       =$_POST['idioma'];
            $porcentaje      =$_POST['porcentaje'];
        
            $SQL          ="delete from idiomas where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $idioma  ya no aparacen en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
        break;
    case 'lectura':
        $filas=$conexion->query("select * from idiomas where candidato_id = $candidato_id");
        $idiomas=array ();
        foreach ($filas as $fila) 
        {
            array_push($idiomas,$fila);

        }
        $respuesta['idiomas']= $idiomas;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>