<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infomarcion de Experiencia</title>
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
    <div class="container" id="experienciasApp">
    <div class="card">
            <div class="card-header bg-info">
                <h4 class="card-title">Información de experiencia para <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?></h4>
            
            </div>
            <div class="card-body">
                <button class="btn btn-info" data-toggle="modal" data-target="#createModal">Nuevo</button>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Inicio P.</th>
                        <th>Fin P.</th>
                        <th>Cargo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="experiencia in experiencias">
                        <td>
                        <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal"
                                @click="selectExperiencia(experiencia)">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"
                                @click="selectExperiencia(experiencia)">
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{experiencia.inicio}}</td>
                        <td>{{experiencia.final}}</td>
                        <td>{{experiencia.cargo}}</td>
                        <td>{{experiencia.descripcion}}</td>
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
                                    Informacion de experiencias  para
                                    <?php echo $filaCandidato['nombres']."".$filaCandidato['apellidos'];?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cargo:</label>
                                            <input type="text" class="form-control" placeholder="Ingrese un cargo" v-model="newExperiencia.cargo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <textarea name="descripcion" id="" cols="20" rows="1" class="form-control" v-model="newExperiencia.descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Inicio P</label>
                                            <input type="date" class="form-control" v-model="newExperiencia.inicio" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Final P</label>
                                            <input type="date" class="form-control" v-model="newExperiencia.final">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="limpiarDatos">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="insertExperiencia">Guardar</button>
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
                                    Actualizar informacion de experiencias  para
                                    <?php echo $filaCandidato['nombres']."".$filaCandidato['apellidos'];?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cargo:</label>
                                            <input type="text" class="form-control" placeholder="Ingrese un cargo" v-model="clikedExperiencia.cargo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <textarea name="descripcion" id="" cols="20" rows="1" class="form-control" v-model="clikedExperiencia.descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Inicio P</label>
                                            <input type="date" class="form-control" v-model="clikedExperiencia.inicio" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Final P</label>
                                            <input type="date" class="form-control" v-model="clikedExperiencia.final">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="limpiarDatos">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="updateExperiencia">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!--delete modal-->
    <div>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title" id="deleteModalLabel">
                                    Desea eliminar la  informacion de experiencias  para
                                    <?php echo $filaCandidato['nombres']."".$filaCandidato['apellidos'];?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cargo:</label>
                                            <input type="text" class="form-control" placeholder="Ingrese un cargo" v-model="clikedExperiencia.cargo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <textarea name="descripcion" id="" cols="20" rows="1" class="form-control" v-model="clikedExperiencia.descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Inicio P</label>
                                            <input type="date" class="form-control" v-model="clikedExperiencia.inicio" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="">Final P</label>
                                            <input type="date" class="form-control" v-model="clikedExperiencia.final">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="limpiarDatos">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="deleteExperiencia">Si, Eliminar</button>
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
        el:"#experienciasApp",
        data:
                {
                    errorMessage: '',
                    succesMessage: '',
                    experiencias: [],
                    newExperiencia:
                    {
                            inicio: '',
                            fin: '',
                            cargo: '',
                            descripcion: '',
                            candidato_id:<?php echo $filaCandidato['id'];?>,
                     },
                     clikedExperiencia: []
                },
                mounted:function(){
                    this.obtenerExperiencias();
                },
            methods:
            {
                obtenerExperiencias: function () {
                    axios.get("http://localhost/hojavida/apiExperiencia.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
                    .then(function (response) {
                    if (response.data.error) {
                        app.errorMessage = response.data.message;
                        }
                            else {
                                app.experiencias = response.data.experiencias;
                                    }
                        });
                },
                limpiarDatos: function () {
                            this.newExperiencia = {
                                inicio: '',
                                fin: '',
                                cargo: '',
                                descripcion: '',
                                candidato_id:<?php echo $filaCandidato['id'];?>,
                                    };
                },
                validar: function (Experiencia) {
                    var respuesta = true;
                    if (Experiencia.inicio == '') {
                        alert("Escriba el inicio del periodo");
                        respuesta = false;

                    }else
                    if (Experiencia.final == '') {
                        alert("Escriba el final del periodo");
                        respuesta = false;

                    }else
                    if (Experiencia.cargo == '') {
                        alert("Escriba el cargo ocupado");
                        respuesta = false;

                    }else
                    if (Experiencia.descripcion == '') {
                        alert("Escriba la descripcion del cargo ocupado");
                        respuesta = false;

                    }

                    return respuesta;
                },
                insertExperiencia: function () {
                    if (app.validar(app.newExperiencia) == true) {
                        var FormData = app.toFormData(app.newExperiencia);
                        axios.post("http://localhost/hojavida/apiExperiencia.php?accion=crear", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerExperiencias();
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
                selectExperiencia: function (experiencia) {
                    app.clikedExperiencia = $.extend({}, experiencia);
                },
                updateExperiencia: function () {
                    if (app.validar(app.clikedExperiencia) == true) {
                        var FormData = app.toFormData(app.clikedExperiencia);
                        axios.post("http://localhost/hojavida/apiExperiencia.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerExperiencias();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }
                },
                deleteExperiencia: function () {
                    var FormData = app.toFormData(app.clikedExperiencia);
                    axios.post("http://localhost/hojavida/apiExperiencia.php?accion=eliminar", FormData)
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.succesMessage = response.data.message;
                                app.obtenerExperiencias();
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