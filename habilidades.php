<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <title>Habilidades</title>
</head>

<body>
    <div class="container" id="habilidadesApp">
        <?php
        //incluimos la conexion y traemos los datos de la tabla candidatos para usarlos
        include 'conexion.php';
        $candidato_id= $_GET['id'];
        $SQLCandidato="select * from candidatos where id = $candidato_id" ;
        $resulCandidato=$conexion->query($SQLCandidato);
        $filaCandidato=$resulCandidato->fetch_assoc();
    ?>
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="card-title">Información de habilidades para
                    <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?></h5>

            </div>
            <div class="card-body">
                <button class="btn btn-info" data-toggle="modal" data-target="#createModal">Nuevo</button>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Habilidad</th>
                        <th>Dominio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="habilidad in habilidades">
                        <td>
                            <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal"
                                @click="selectHabilidad(habilidad)">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"
                                @click="selectHabilidad(habilidad)">
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>

                        <td>{{habilidad.habilidad}}</td>
                        <td>{{habilidad.porcentaje}}%</td>
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
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">
                                Informacion de habilidades para
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
                                        <label for="">Habilidad:</label>
                                        <input type="text" class="form-control" v-model="newHabilidad.habilidad"
                                            placehoholder="Escriba una habilidad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dominio:</label>
                                        <input class="form-control" type="number" min="5" max="100" step="5" value="0"
                                            title="Dominio de esta habilidad" v-model="newHabilidad.porcentaje" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="insertHabilidad">Guardar</button>
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
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">
                               Editar informacion de habilidades para
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
                                        <label for="">Habilidad:</label>
                                        <input type="text" class="form-control" v-model="clikedHabilidad.habilidad"
                                            placehoholder="Escriba una habilidad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dominio:</label>
                                        <input class="form-control" type="number" min="5" max="100" step="5" value="0"
                                            title="Dominio de esta habilidad" v-model="clikedHabilidad.porcentaje" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="updateHabilidad">Guardar</button>
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
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">
                              Confirme eliminación de informacion de habilidades para
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
                                        <label for="">Habilidad:</label>
                                        <input type="text" class="form-control" v-model="clikedHabilidad.habilidad"
                                            placehoholder="Escriba una habilidad" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dominio:</label>
                                        <input class="form-control" type="number" min="5" max="100" step="5" value="0"
                                            title="Dominio de esta habilidad" v-model="clikedHabilidad.porcentaje" disabled />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="deleteHabilidad">Si, eliminar</button>
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
        //codigo JS para el app.js
        var app = new Vue
            ({
                el: '#habilidadesApp',
                data:
                {
                    errorMessage: '',
                    succesMessage: '',
                    habilidades: [],
                    newHabilidad:
                        {
                            habilidad: '',
                            porcentaje: 0,
                            candidato_id:<?php echo $filaCandidato['id'];?>,
                 },
                clikedHabilidad: []
            },
                mounted: function () {
                    this.obtenerHabilidades();
                },
                methods: {
                    obtenerHabilidades: function () {
                        axios.get("http://localhost/hojavida/apiHabilidades.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.habilidades = response.data.habilidades;
                                }
                            });
                    },
                    limpiarDatos: function () {
                        this.newHabilidad = {
                            habilidad: '',
                            porcentaje: 0,
                            candidato_id:<?php echo $filaCandidato['id'];?>,
                                };
                },

                validar: function (Habilidad) {
                    var respuesta = true;
                    if (Habilidad.habilidad == '') {
                        alert("Escriba una habilidad");
                        respuesta = false;

                    }


                    return respuesta;
                },
                insertHabilidad: function () {
                    if (app.validar(app.newHabilidad) == true) {
                        var FormData = app.toFormData(app.newHabilidad);
                        axios.post("http://localhost/hojavida/apiHabilidades.php?accion=crear", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerHabilidades();
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
                selectHabilidad: function (habilidad) {
                    app.clikedHabilidad = $.extend({}, habilidad);
                },
                updateHabilidad: function () {
                    if (app.validar(app.clikedHabilidad) == true) {
                        var FormData = app.toFormData(app.clikedHabilidad);
                        axios.post("http://localhost/hojavida/apiHabilidades.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerHabilidades();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }
                },
                deleteHabilidad: function () {
                    var FormData = app.toFormData(app.clikedHabilidad);
                    axios.post("http://localhost/hojavida/apiHabilidades.php?accion=eliminar", FormData)
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.succesMessage = response.data.message;
                                app.obtenerHabilidades();
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