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
                        
            $cualidad        =$_POST['cualidad'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into cualidades (cualidad, candidato_id) values ('$cualidad','$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $cualidad los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':

            $id              =$_POST['id'];
            $cualidad       =$_POST['cualidad'];
        
            $SQL="update cualidades set  cualidad='$cualidad'  where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $cualidad los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id              =$_POST['id'];
            $cualidad       =$_POST['cualidad'];
        
            $SQL          ="delete from cualidades where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $cualidad ya no aparacen en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
        break;
    case 'lectura':
        $filas=$conexion->query("select * from cualidades where candidato_id = $candidato_id");
        $cualidades=array ();
        foreach ($filas as $fila) 
        {
            array_push($cualidades,$fila);

        }
        $respuesta['cualidades']= $cualidades;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>