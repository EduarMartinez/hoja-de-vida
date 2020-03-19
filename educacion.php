<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Educacion</title>
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
    <div class="container" id="educacionesApp">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="card-title">Informacion de Educacion para
                    <?php echo $filaCandidato['nombres']." " .$filaCandidato['apellidos']?></h5>

            </div>
            <div class="card-body">
                <button class="btn btn-info" data-toggle="modal" data-target="#createModal">Nuevo</button>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Inicio P.</th>
                        <th>Final P.</th>
                        <th>Titulo</th>
                        <th>Institucion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="educacion in educacion">
                        <td>
                            <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal" @click="selectEducacion(educacion)">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal" @click="selectEducacion(educacion)">
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{educacion.inicio}}</td>
                        <td>{{educacion.final}}</td>
                        <td>{{educacion.titulo}}</td>
                        <td>{{educacion.institucion}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--createModal-->
        <div>
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title" id="createModalLabel">
                                    Informacion de Educacion  para
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
                                                    <label for="">Titulo:</label>
                                                   <input type="text" class="form-control" placeholder="Ingrese el titulo de la educacion" v-model="newEducacion.titulo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Institucion:</label>
                                                   <input type="text" class="form-control" placeholder="Ingrese el la institucion" v-model="newEducacion.institucion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Inicio P</label>
                                                    <input type="date" class="form-control"  v-model="newEducacion.inicio">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="">Final P</label>
                                                    <input type="date" class="form-control" v-model="newEducacion.final" >
                                                </div>
                                            </div>
                                        </div>
                             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="insertEducacion">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
         <!--editModal-->
         <div>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="editModalLabel">
                               Actualizar informacion de Educacion  para
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
                                                <label for="">Titulo:</label>
                                               <input type="text" class="form-control" placeholder="Ingrese el titulo de la educacion" v-model="clikedEducacion.titulo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Institucion:</label>
                                               <input type="text" class="form-control" placeholder="Ingrese el la institucion" v-model="clikedEducacion.institucion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Inicio P</label>
                                                <input type="date" class="form-control" v-model="clikedEducacion.inicio"  >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="">Final P</label>
                                                <input type="date" class="form-control" v-model="clikedEducacion.final" >
                                            </div>
                                        </div>
                                    </div>
                         
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="updateEducacion">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
         </div>
          <!--deleteModal-->
          <div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="deleteModalLabel">
                                Desea eliminar la informacion de Educacion  para
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
                                                <label for="">Titulo:</label>
                                               <input type="text" class="form-control" placeholder="Ingrese el titulo de la educacion" v-model="clikedEducacion.titulo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Institucion:</label>
                                               <input type="text" class="form-control" placeholder="Ingrese el la institucion" v-model="clikedEducacion.institucion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Inicio P</label>
                                                <input type="date" class="form-control" v-model="clikedEducacion.inicio"  >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="">Final P</label>
                                                <input type="date" class="form-control" v-model="clikedEducacion.final" >
                                            </div>
                                        </div>
                                    </div>
                         
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="deleteEducacion">Si, eliminar</button>
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
        var app = new Vue({
            el: "#educacionesApp",
            data:
            {
                errorMessage: '',
                succesMessage: '',
                educacion: [],
                newEducacion:
                    {
                        inicio: '',
                        final: '',
                        titulo: '',
                        institucion: '',
                        candidato_id:<?php echo $filaCandidato['id'];?>,
            },
            clikedEducacion: []
        },
            mounted: function () {
                this.obtenerEducacion();
            },
            methods:
            {
                obtenerEducacion: function () {
                    axios.get("http://localhost/hojavida/apiEducacion.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.educacion = response.data.educacion;
                            }
                        });
                },
                limpiarDatos: function () {
                    this.newEducacion = {
                        inicio: '',
                        final: '',
                        titulo: '',
                        institucion: '',
                        candidato_id:<?php echo $filaCandidato['id'];?>,
                                };
            },
            
        validar: function (Educacion) {
            var respuesta = true;
            if (Educacion.inicio == '') {
                alert("Escriba el inicio del periodo");
                respuesta = false;

            }else
            if (Educacion.final == '') {
                alert("Escriba el final del periodo");
                respuesta = false;

            }else
            if (Educacion.titulo == '') {
                alert("Escriba un titulo");
                respuesta = false;

            }else
            if (Educacion.institucion == '') {
                alert("Escriba una institucion");
                respuesta = false;

            }


            return respuesta;
        },
        insertEducacion: function () {
            if (app.validar(app.newEducacion) == true) {
                var FormData = app.toFormData(app.newEducacion);
                axios.post("http://localhost/hojavida/apiEducacion.php?accion=crear", FormData)
                    .then(function (response) {
                        if (response.data.error) {
                            app.errorMessage = response.data.message;
                        }
                        else {
                            app.succesMessage = response.data.message;
                            app.obtenerEducacion();
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
        selectEducacion: function (educacion) {
                    app.clikedEducacion = $.extend({}, educacion);
                },
                updateEducacion: function () {
                    if (app.validar(app.clikedEducacion) == true) {
                        var FormData = app.toFormData(app.clikedEducacion);
                        axios.post("http://localhost/hojavida/apiEducacion.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerEducacion();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }
                },
                deleteEducacion: function () {
                    var FormData = app.toFormData(app.clikedEducacion);
                    axios.post("http://localhost/hojavida/apiEducacion.php?accion=eliminar", FormData)
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.succesMessage = response.data.message;
                                app.obtenerEducacion();
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