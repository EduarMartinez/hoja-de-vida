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
                                
            $pasatiempo       =$_POST['pasatiempo'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into pasatiempos (pasatiempo, candidato_id) values ('$pasatiempo','$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $pasatiempo los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':
            $id         =$_POST['id'];
            $pasatiempo= $_POST['pasatiempo'];
            $candidato_id=$_POST['candidato_id'];

            $SQL="update pasatiempos set pasatiempo='$pasatiempo' where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $pasatiempo los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id              =$_POST['id'];
            $pasatiempo      =$_POST['pasatiempo'];
        
            $SQL          ="delete from pasatiempos where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $pasatiempo ya no aparacen en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
        break;
    case 'lectura':
        $filas=$conexion->query("select * from pasatiempos where candidato_id = $candidato_id");
        $pasatiempos=array ();
        foreach ($filas as $fila) 
        {
            array_push($pasatiempos,$fila);

        }
        $respuesta['pasatiempos']= $pasatiempos;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>