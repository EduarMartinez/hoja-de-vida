<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
</head>
<?php
    include 'conexion.php';
    $candidato_id= $_GET['id'];
    $SQLCandidato="select * from candidatos where id = $candidato_id" ;
    $resulCandidato=$conexion->query($SQLCandidato);
    $filaCandidato=$resulCandidato->fetch_assoc();
?>

<body>
    <div class="container" id="contactosApp">
        <div class="card">
            <div class="card-header bg-info">

                <h5 class="card-title">Información de contactos para
                    <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?></h5>
            </div>
            <div class="card-body">
                <button class="btn btn-info" data-toggle="modal" data-target="#createModal">Nuevo</button>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="contacto in contactos">
                        <td>
                            <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal" @click="selectContacto(contacto)">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal" @click="selectContacto(contacto)">
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <i :class="'fa '+contacto.tipo+' fa-2x'" aria-hidden="true" style="color:grey;"></i>
                        </td>
                        <td>{{contacto.descripcion}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!--CreateModal-->
        <div>
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="createModalLabel">
                                Informacion de contacto para
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
                                        <label for="">Tipo:</label>
                                        <select name="tipo" class="form-control" v-model="newContacto.tipo">
                                            <option value="fa-whatsapp">WhatsApp</option>
                                            <option value="fa-facebook-official">Facebook</option>
                                            <option value="fa-snapchat-ghost">Snaptchat</option>
                                            <option value="fa-twitter">Twitter</option>
                                            <option value="fa-mobile">Celular</option>
                                            <option value="fa-instagram">Instagram</option>
                                            <option value="fa-envelope">Gmail</option>
                                            <option value="fa-yahoo">Yahoo</option>
                                            <option value="fa-telegram">Telegram</option>
                                            <option value="fa-github">GitHub</option>
                                            <option value="fa-vimeo">Vimeo</option>
                                            <option value="fa-youtube">YouTube</option>
                                            <option value="fa-pinterest-square">Pinterest</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Descripción:</label>
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese el tipo de contacto" v-model="newContacto.descripcion">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="insertContacto">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!--EditModal-->
         <div>
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title" id="editModalLabel">
                                   Actualizar informacion de contacto para
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
                                            <label for="">Tipo:</label>
                                        <select class="form-control" v-model="clikedContacto.tipo">
                                            <option value="fa-whatsapp">WhatsApp</option>
                                            <option value="fa-facebook-official">Facebook</option>
                                            <option value="fa-snapchat-ghost">Snaptchat</option>
                                            <option value="fa-twitter">Twitter</option>
                                            <option value="fa-mobile">Celular</option>
                                            <option value="fa-instagram">Instagram</option>
                                            <option value="fa-envelope">Gmail</option>
                                            <option value="fa-yahoo">Yahoo</option>
                                            <option value="fa-telegram">Telegram</option>
                                            <option value="fa-github">GitHub</option>
                                            <option value="fa-vimeo">Vimeo</option>
                                            <option value="fa-youtube">YouTube</option>
                                            <option value="fa-pinterest-square">Pinterest</option>
    
                                            </select>
                                        </div>
    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Descripción:</label>
                                            <input type="text" class="form-control"
                                                placeholder="Ingrese el tipo de contacto" v-model="clikedContacto.descripcion">
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="limpiarDatos">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="updateContacto">Guardar</button>
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
                                    Actualizar informacion de contacto para
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
                                                <label for="">Tipo:</label>
                                            <select class="form-control" v-model="clikedContacto.tipo">
                                                    <option value="fa-whatsapp">WhatsApp</option>
                                                    <option value="fa-facebook-official">Facebook</option>
                                                    <option value="fa-snapchat-ghost">Snaptchat</option>
                                                    <option value="fa-twitter">Twitter</option>
                                                    <option value="fa-mobile">Celular</option>
                                                    <option value="fa-instagram">Instagram</option>
                                                    <option value="fa-envelope">Gmail</option>
                                                    <option value="fa-yahoo">Yahoo</option>
                                                    <option value="fa-telegram">Telegram</option>
                                                    <option value="fa-github">GitHub</option>
                                                    <option value="fa-vimeo">Vimeo</option>
                                                    <option value="fa-youtube">YouTube</option>
                                                    <option value="fa-pinterest-square">Pinterest</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Descripción:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Ingrese el tipo de contacto" v-model="clikedContacto.descripcion">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal"
                                        @click="limpiarDatos">Cancelar</button>
                                    <button type="button" class="btn btn-primary" @click="deleteContacto">Si, eliminar</button>
                                </div>
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
            el: '#contactosApp',
            data:
            {
                errorMessage: '',
                succesMessage: '',
                contactos: [],
                newContacto:
                    {
                        tipo: '',
                        descripcion: '',
                        candidato_id:<?php echo $filaCandidato['id'];?>,
                 },
                clikedContacto: []
             },
            mounted: function () {
                this.obtenerContactos();
            },
            methods: {
                obtenerContactos: function () {
                    axios.get("http://localhost/hojavida/apiContactos.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.contactos = response.data.contactos;
                            }
                        });
                },
                limpiarDatos: function () {
                    this.newContacto = {
                        tipo: '',
                        descripcion: '',
                        candidato_id:<?php echo $filaCandidato['id'];?>,
                                };
                },
                validar: function (Contacto) {
                    var respuesta = true;
                    if (Contacto.tipo == '') {
                        alert("Seleccione un tipo de contacto");
                        respuesta = false;

                    }
                    else
                    if (Contacto.descripcion == '') {
                        alert("Escriba la descripcion del contacto");
                        respuesta = false;

                    }


                    return respuesta;
                },
                insertContacto: function () {
                    if (app.validar(app.newContacto) == true) {
                        var FormData = app.toFormData(app.newContacto);
                        axios.post("http://localhost/hojavida/apiContactos.php?accion=crear", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerContactos();
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
               
                selectContacto: function (contacto) {
                    app.clikedContacto = $.extend({}, contacto);
                },
                updateContacto: function () {
                    if (app.validar(app.clikedContacto) == true) {
                        var FormData = app.toFormData(app.clikedContacto);
                        axios.post("http://localhost/hojavida/apiContactos.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerContactos();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                    }
                },
                deleteContacto: function() {
                    var FormData = app.toFormData(app.clikedContacto);
                    axios.post("http://localhost/hojavida/apiContactos.php?accion=eliminar", FormData)
                    .then(function (response) {
                        if (response.data.error) {
                            app.errorMessage = response.data.message;
                        }
                        else {
                            app.succesMessage = response.data.message;
                            app.obtenerContactos();
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