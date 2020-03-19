<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idiomas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <?php
        include 'conexion.php';
        $candidato_id=$_GET['id'];
        $SQLcandidato="select * from candidatos where id= $candidato_id";
        $resulCandidato=$conexion->query($SQLcandidato);
        $filaCandidato=$resulCandidato->fetch_assoc();
    ?>

    <div class="container" id="idiomasApp">
        <div class="card">
                <div class="card-header bg-info " style="color:white; font-size:20px;">
                    Infomación de idiomas para <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos']?>
                </div>
                <div class="card-body">
                    <button class="btn btn-info" data-toggle="modal" data-target="#createModal"> Nuevo</button>
                </div>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Idioma</th>
                            <th>Porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="idioma in idiomas">
                            <td>
                                <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal"
                                    @click="selectIdioma(idioma)">
                                    <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal"
                                @click="selectIdioma(idioma)">
                                    <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{{idioma.idioma}}</td>
                            <td>{{idioma.porcentaje}}%</td>
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
                                Informacion de idioma para
                                <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Idioma:</label>
                                        <input type="text" class="form-control" placeholder="Ingrese idiomas"
                                            v-model="newIdioma.idioma">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dominio:</label>
                                        <input class="form-control" type="number" min="5" max="100" step="5" value="0"
                                            title="Dominio de este idioma" v-model="newIdioma.porcentaje" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="insertIdioma">Guardar</button>
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
                              Actualizar informacion de idioma para
                                <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Idioma:</label>
                                        <input type="text" class="form-control" placeholder="Ingrese idiomas"
                                            v-model="clikedIdioma.idioma">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dominio:</label>
                                        <input class="form-control" type="number" min="5" max="100" step="5" value="0"
                                            title="Dominio de este idioma" v-model="clikedIdioma.porcentaje" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="updateIdioma">Guardar</button>
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
                              Está seguro que desea eliminar la  informacion de Idiomas para
                                <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Idioma:</label>
                                        <input type="text" class="form-control" placeholder="Ingrese idiomas"
                                            v-model="clikedIdioma.idioma" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dominio:</label>
                                        <input class="form-control" type="number" min="5" max="100" step="5" value="0"
                                            title="Dominio de este idioma" v-model="clikedIdioma.porcentaje" disabled />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="deleteIdioma">Si,Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vue.js"></script>
    <script src="js/axios.min.js"></script>
    <script>
    var app = new Vue({
            el: '#idiomasApp',
            data: {
                errorMessage: '',
                succesMessage: '',
                idiomas: [],
                newIdioma: {
                    idioma: '',
                    Porcentaje: '',
                    candidato_id:<?php echo $filaCandidato['id'];?>,
                 },
                clikedIdioma: []
             },
            mounted: function () {
                this.obtenerIdiomas();
            },
                methods:{
                    obtenerIdiomas: function() {
                                    axios.get("http://localhost/hojavida/apiIdiomas.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
                                        .then(function (response) {
                                            if (response.data.error) {
                                                app.errorMessage = response.data.message;
                                            }
                                            else {
                                                app.idiomas = response.data.idiomas;
                                            }
                                        })
                    },
                    limpiarDatos: function(){
                                this.newIdioma = {
                                        idioma: '',
                                        porcentaje: 0,
                                        candidato_id:<?php echo $filaCandidato['id'];?>,
                                    };
                    },
                validar: function(Idioma) {
                    var respuesta = true;
                    if (Idioma.idioma == '') {
                        alert("Escriba un idioma");
                        respuesta = false;

                    }


                    return respuesta;
                },
                insertIdioma: function() {
                    if (app.validar(app.newIdioma) == true) {
                        var FormData = app.toFormData(app.newIdioma);
                        axios.post("http://localhost/hojavida/apiIdiomas.php?accion=crear", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerIdiomas();
                                    $('#createModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }


                },
                toFormData: function(obj) {
                    var form_data = new FormData();
                    for (var key in obj) {
                        form_data.append(key, obj[key]);

                    }
                    return form_data;
                },
                selectIdioma: function (idioma) {
                    app.clikedIdioma = $.extend({}, idioma);
                },
                updateIdioma: function() {
                    if (app.validar(app.clikedIdioma) == true) {
                        var FormData = app.toFormData(app.clikedIdioma);
                        axios.post("http://localhost/hojavida/apiIdiomas.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerIdiomas();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }
                },
                deleteIdioma: function() {
                    var FormData = app.toFormData(app.clikedIdioma);
                    axios.post("http://localhost/hojavida/apiIdiomas.php?accion=eliminar", FormData)
                    .then(function (response) {
                        if (response.data.error) {
                            app.errorMessage = response.data.message;
                        }
                        else {
                            app.succesMessage = response.data.message;
                            app.obtenerIdiomas();
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