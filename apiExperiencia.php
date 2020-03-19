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
                        
            $inicio          =$_POST['inicio'];
            $final           =$_POST['final'];
            $cargo           =$_POST['cargo'];
            $descripcion     =$_POST['descripcion'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into experiencias (inicio, final, cargo, descripcion, candidato_id) values ('$inicio','$final','$cargo','$descripcion','$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $cargo los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':

            $id              =$_POST['id'];
            $inicio        =$_POST['inicio'];
            $final        =$_POST['final'];
            $cargo        =$_POST['cargo'];
            $descripcion        =$_POST['descripcion'];
            
        
            $SQL="update experiencias set  inicio='$inicio',final='$final',cargo='$cargo',descripcion='$descripcion'  where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $cargo los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id                 =$_POST['id'];
            $inicio             =$_POST['inicio'];
            $final              =$_POST['final'];
            $cargo              =$_POST['cargo'];
            $descripcion        =$_POST['descripcion'];
            
        
            $SQL          ="delete from experiencias where id= $id";

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
        $filas=$conexion->query("select * from experiencias where candidato_id = $candidato_id");
        $experiencias=array ();
        foreach ($filas as $fila) 
        {
            array_push($experiencias,$fila);

        }
        $respuesta['experiencias']= $experiencias;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>