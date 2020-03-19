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
                                
            $tipo       =$_POST['tipo'];
            $descripcion      =$_POST['descripcion'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into contactos (tipo, descripcion, candidato_id) values ('$tipo','$descripcion','$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $contacto los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':
            $id         =$_POST['id'];
            $tipo       =$_POST['tipo'];
            $descripcion=$_POST['descripcion'];

            $SQL="update contactos set  descripcion='$descripcion',tipo='$tipo' where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $contacto los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id              =$_POST['id'];
            $tipo            =$_POST['tipo'];
            $descripcion     =$_POST['descripcion'];
        
            $SQL          ="delete from contactos where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $descripcion ya no aparacen en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
        break;
    case 'lectura':
        $filas=$conexion->query("select * from contactos where candidato_id = $candidato_id");
        $contactos=array ();
        foreach ($filas as $fila) 
        {
            array_push($contactos,$fila);

        }
        $respuesta['contactos']= $contactos;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>