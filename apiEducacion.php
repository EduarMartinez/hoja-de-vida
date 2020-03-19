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
                        
            $inicio        =$_POST['inicio'];           
            $final         =$_POST['final'];
            $titulo        =$_POST['titulo'];
            $institucion        =$_POST['institucion'];
            $candidato_id    =$_POST['candidato_id'];

            $SQL="insert into educaciones (inicio,final,titulo,institucion, candidato_id) values ('$inicio', '$final', '$titulo', '$institucion', '$candidato_id')";
            
            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $titulo los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
            break;

    case 'actualizar':

            $id              =$_POST['id'];
            $inicio          =$_POST['inicio'];           
            $final           =$_POST['final'];
            $titulo          =$_POST['titulo'];
            $institucion     =$_POST['institucion'];
     
        
            $SQL="update educaciones set  inicio='$inicio',final='$final', titulo='$titulo', institucion='$institucion'  where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $titulo los puede verificar en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }

            break;
    case 'eliminar':
            $id              =$_POST['id'];
            $inicio          =$_POST['inicio'];           
            $final           =$_POST['final'];
            $titulo          =$_POST['titulo'];
            $institucion     =$_POST['institucion'];
      
        
            $SQL          ="delete from educaciones where id= $id";

            if ($conexion->query($SQL)===TRUE)
            {
                $respuesta['message']="Los datos de $titulo ya no aparacen en la lista siguiente.";
            }
            else
            {
                $respuesta['error']=TRUE;
                $respuesta['message']="<h1> Error :" . $SQL . "<br>" . $conexion->error. "</h1>";
            }
        break;
    case 'lectura':
        $filas=$conexion->query("select * from educaciones where candidato_id = $candidato_id");
        $educacion=array ();
        foreach ($filas as $fila) 
        {
            array_push($educacion,$fila);

        }
        $respuesta['educacion']= $educacion;
        break;

    
    
}
$conexion->close();
header("content-type: application/json ");
echo json_encode($respuesta);
?>