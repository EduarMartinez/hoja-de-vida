<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cualidades</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <?php
    include 'conexion.php';
    $candidato_id= $_GET['id'];
    $SQLCandidato="select * from candidatos where id = $candidato_id" ;
    $resulCandidato=$conexion->query($SQLCandidato);
    $filaCandidato=$resulCandidato->fetch_assoc();
    ?>
</head>
<body>
<div class="container" id="cualidadesApp">
<div class="card">
  <div class="card-header bg-info" style="color: white;">
      <h4 class="card-title">Infomarcion de cualidades para <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos']?></h4>
      
  </div>
  <div class="card-body">
    <button class="btn btn-info" data-toggle="modal" data-target="#createModal">Nuevo</button>
  </div>
  <table class="table table-striped text-center">
    <thead>
            <tr>
                    <th>Acciones</th>
                    <th>Cualidad</th>
                </tr>
    </thead>
    <tbody>
        <tr v-for="cualidad in cualidades" >
                <td>
                     <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal"
                    @click="selectCualidad(cualidad)">
                    <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                </a>
                <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"
                    @click="selectCualidad(cualidad)">
                    <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                </a>
            </td>
                <td>{{cualidad.cualidad}}</td>
        </tr>
    </tbody>
      
   

   </table>
</div>
 <!--Create modal-->
 <div>
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="createModalLabel">
                                Informacion de cualidadaes para
                                <?php echo $filaCandidato['nombres']."".$filaCandidato['apellidos'];?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Cualidad:</label>
                                        <input type="text" class="form-control" placeholder="Ingrese una habilidad" v-model="newCualidad.cualidad">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="insertCualidad">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
 </div>
 <!--edit modal-->
 <div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="editModalLabel">
                        Actualizar la informacion de cualidades para
                        <?php echo $filaCandidato['nombres']."".$filaCandidato['apellidos'];?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Cualidad:</label>
                                <input type="text" class="form-control" placeholder="Ingrese una habilidad" v-model="clikedCualidad.cualidad">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"
                        @click="limpiarDatos">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="updateCualidad">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--Create modal-->
 <div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info" >
                    <h5 class="modal-title" id="deleteModalLabel">
                        Desea eliminar la informacion de cualidades para
                        <?php echo $filaCandidato['nombres']."".$filaCandidato['apellidos'];?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Cualidad:</label>
                                <input type="text" class="form-control" placeholder="Ingrese una habilidad" v-model="clikedCualidad.cualidad">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"
                        @click="limpiarDatos">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="deleteCualidad">Si, Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/axios.min.js"></script>
<script src="js/vue.js"></script>
<script>
var app=new Vue({
    el:'#cualidadesApp',
             data:
                {
                    errorMessage: '',
                    succesMessage: '',
                    cualidades: [],
                    newCualidad:
                        {
                            cualidad: '',
                            candidato_id:<?php echo $filaCandidato['id'];?>,
                 },
                clikedCualidad: []
            },
            mounted: function () {
                    this.obtenerCualidades();
                },
            methods: {
             obtenerCualidades: function () {
              axios.get("http://localhost/hojavida/apiCualidades.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
             .then(function (response) {
                if (response.data.error) {
                     app.errorMessage = response.data.message;
                    }
                        else {
                             app.cualidades = response.data.cualidades;
                                }
                    });
                    },
             limpiarDatos: function () {
                        this.newCualidad = {
                            cualidad: '',
                            candidato_id:<?php echo $filaCandidato['id'];?>,
                                };
                },
                validar: function (Cualidad) {
                    var respuesta = true;
                    if (Cualidad.cualidad == '') {
                        alert("Escriba una cualidad");
                        respuesta = false;

                    }


                    return respuesta;
                },
                insertCualidad: function () {
                    if (app.validar(app.newCualidad) == true) {
                        var FormData = app.toFormData(app.newCualidad);
                        axios.post("http://localhost/hojavida/apiCualidades.php?accion=crear", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerCualidades();
                                    $('#createModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }


                },
                toFormData: function (obj) {
                    var form_data = new FormData();
                    for (var key in obj) {
                        form_data.append(key, obj[key]);

                    }
                    return form_data;
                },
                selectCualidad: function (cualidad) {
                    app.clikedCualidad = $.extend({}, cualidad);
                },
                updateCualidad: function () {
                    if (app.validar(app.clikedCualidad) == true) {
                        var FormData = app.toFormData(app.clikedCualidad);
                        axios.post("http://localhost/hojavida/apiCualidades.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerCualidades();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }
                },
                deleteCualidad: function () {
                    var FormData = app.toFormData(app.clikedCualidad);
                    axios.post("http://localhost/hojavida/apiCualidades.php?accion=eliminar", FormData)
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.succesMessage = response.data.message;
                                app.obtenerCualidades();
                                $('#deleteModal').modal('hide');
                                app.limpiarDatos();
                            }

                        });

                },
            },
            
});
</script>
</body>
</html>