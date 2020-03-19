<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pasatiempos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <?php
        include 'conexion.php';
        $candidato_id=$_GET['id'];
        $SQLcandidato="select * from candidatos where id= $candidato_id";
        $resulCandidato=$conexion->query($SQLcandidato);
        $filaCandidato=$resulCandidato->fetch_assoc();
    ?>
</head>

<body>
    <div class="container" id="pasatiemposApp">
            <div class="card">
                    <div class="card-header bg-info">
                    <figure class="figure">
                        <img src="<?php echo $fila['foto']; ?>" class="figure-img img-fluid rounded" alt=""
                            style="width: 100%; border-radius: 5px;">
                     </figure>
        
                        <h5 class="card-title">Información de pasatiempos para
                            <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?></h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info" data-toggle="modal" data-target="#createModal">Nuevo</button>
                    </div>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>Pasatiempo</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="pasatiempo in pasatiempos">
                                <td>
                                    <a href="#" class="text-primary" data-toggle="modal" data-target="#editModal" @click="selectPasatiempo(pasatiempo)">
                                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal" @click="selectPasatiempo(pasatiempo)">
                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    <figure class="figure">
                                        <img :src="pasatiempo.pasatiempo" class="figure-img img-fluid rounded"
                                            style="width: 100px; height: 100px;"> 
                                            <figcaption class="figure-caption text-center" > 
                                            </figcaption>       
                                    </figure>
                                           
                                </td>
                          
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
                                    Informacion de pasatiempos para
                                    <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pasatiempo</label>
                                          <select id="" class="form-control" v-model="newPasatiempo.pasatiempo">
                                              <option value="img/png/futbol.pgn">Practicar Futbol</option>
                                              <option value="img/png/volibol.png">Practicar Voleibol</option>
                                              <option value="img/png/celular.png">Celular</option>
                                              <option value="img/png/americano.png">Practicar Futbol Americano</option>
                                              <option value="img/png/libro.png">Leer</option>
                                              <option value="img/png/playa.png">Viajar</option>
                                              <option value="img/png/cine.png">Ir al cine</option>
                                              <option value="img/png/plantar.png">Plantar </option>
                                              <option value="img/png/television.png">Ver TV</option>
                                              <option value="img/png/baloncesto.png">Practicar Basketball</option>
                                              <option value="img/png/guitarra.png">Tocar Guitarra</option>
                                              <option value="img/png/ciclista.png">Andar en bicicleta</option>
                                              <option value="img/png/escucharmusica.png">Escuchar musica</option>
                                              <option value="img/png/conducir.png">Conducir Automoviles</option>
                                              <option value="img/png/compras.png">Salir de compras</option>
                                              <option value="img/png/moto.png">Conducir moto</option>
                                              <option value="img/png/internet.png">Navegar por Internet</option>
                                              <option value="img/png/tenis.png">Practicar tenis</option>
                                              <option value="img/png/ejercicio.png">Hacer ejercicio</option>
                                              <option value="img/png/netflix.png">Hacer ejercicio</option>
           

                                          </select>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="limpiarDatos">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="insertPasatiempo">Guardar</button>
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
                                    Actualizar informacion de pasatiempos para
                                    <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pasatiempo</label>
                                          <select id="" class="form-control" v-model="clikedPasatiempo.pasatiempo">
                                          <option value="img/png/futbol.pgn">Practicar Futbol</option>
                                          <option value="img/png/futbol.pgn">Practicar Futbol</option>
                                              <option value="img/png/volibol.png">Practicar Voleibol</option>
                                              <option value="img/png/celular.png">Celular</option>
                                              <option value="img/png/americano.png">Practicar Futbol Americano</option>
                                              <option value="img/png/libro.png">Leer</option>
                                              <option value="img/png/playa.png">Viajar</option>
                                              <option value="img/png/cine.png">Ir al cine</option>
                                              <option value="img/png/plantar.png">Plantar </option>
                                              <option value="img/png/television.png">Ver TV</option>
                                              <option value="img/png/baloncesto.png">Practicar Basketball</option>
                                              <option value="img/png/guitarra.png">Tocar Guitarra</option>
                                              <option value="img/png/ciclista.png">Andar en bicicleta</option>
                                              <option value="img/png/escucharmusica.png">Escuchar musica</option>
                                              <option value="img/png/conducir.png">Conducir Automoviles</option>
                                              <option value="img/png/compras.png">Salir de compras</option>
                                              <option value="img/png/moto.png">Conducir moto</option>
                                              <option value="img/png/internet.png">Navegar por Internet</option>
                                              <option value="img/png/tenis.png">Practicar tenis</option>
                                              <option value="img/png/ejercicio.png">Hacer ejercicio</option>
                                              <option value="img/png/netflix.png">Hacer ejercicio</option>

                                          </select>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"
                                    @click="limpiarDatos">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="updatePasatiempo">Guardar</button>
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
                                Desea eliminar la informacion de pasatiempos para
                                <?php echo $filaCandidato['nombres']." ".$filaCandidato['apellidos'];?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Pasatiempo</label>
                                      <select id="" class="form-control" v-model="clikedPasatiempo.pasatiempo">
                                      <option value="img/png/futbol.pgn">Practicar Futbol</option>
                                      <option value="img/png/futbol.pgn">Practicar Futbol</option>
                                              <option value="img/png/volibol.png">Practicar Voleibol</option>
                                              <option value="img/png/celular.png">Celular</option>
                                              <option value="img/png/americano.png">Practicar Futbol Americano</option>
                                              <option value="img/png/libro.png">Leer</option>
                                              <option value="img/png/playa.png">Viajar</option>
                                              <option value="img/png/cine.png">Ir al cine</option>
                                              <option value="img/png/plantar.png">Plantar </option>
                                              <option value="img/png/television.png">Ver TV</option>
                                              <option value="img/png/baloncesto.png">Practicar Basketball</option>
                                              <option value="img/png/guitarra.png">Tocar Guitarra</option>
                                              <option value="img/png/ciclista.png">Andar en bicicleta</option>
                                              <option value="img/png/escucharmusica.png">Escuchar musica</option>
                                              <option value="img/png/conducir.png">Conducir Automoviles</option>
                                              <option value="img/png/compras.png">Salir de compras</option>
                                              <option value="img/png/moto.png">Conducir moto</option>
                                              <option value="img/png/internet.png">Navegar por Internet</option>
                                              <option value="img/png/tenis.png">Practicar tenis</option>
                                              <option value="img/png/ejercicio.png">Hacer ejercicio</option>
                                              <option value="img/png/netflix.png">Hacer ejercicio</option>

                                      </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"
                                @click="limpiarDatos">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="deletePasatiempo">Si, eliminar</button>
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
            el: '#pasatiemposApp',
            data:
            {
                errorMessage: '',
                succesMessage: '',
                pasatiempos: [],
                newPasatiempo:
                    {
                        pasatiempo: '',
                        candidato_id: <?php echo $filaCandidato['id'];?>,
                    },
                clikedPasatiempo: []
            },
            mounted: function () {
                this.obtenerPasatiempos();
            },
             methods: 
             {
                    obtenerPasatiempos: function () {
                        axios.get("http://localhost/hojavida/apiPasatiempos.php?accion=lectura&id=<?php echo $filaCandidato['id'];?>")
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.pasatiempos = response.data.pasatiempos;
                                }
                            });
                    },
                    limpiarDatos: function () {
                        this.newPasatiempo = {
                            pasatiempo: '',
                            candidato_id:<?php echo $filaCandidato['id'];?>,
                        };
                       },
                    validar: function (Pasatiempo) {
                        var respuesta = true;
                        if (Pasatiempo.pasatiempo == '') {
                            alert("Seleccione su pasatiempo");
                            respuesta = false;

                        }

                        return respuesta;
                    },
                    insertPasatiempo: function () {
                        if (app.validar(app.newPasatiempo) == true) {
                            var FormData = app.toFormData(app.newPasatiempo);
                            axios.post("http://localhost/hojavida/apiPasatiempos.php?accion=crear", FormData)
                                .then(function (response) {
                                    if (response.data.error) {
                                        app.errorMessage = response.data.message;
                                    }
                                    else {
                                        app.succesMessage = response.data.message;
                                        app.obtenerPasatiempos();
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
                    selectPasatiempo: function (pasatiempo) {
                        app.clikedPasatiempo = $.extend({}, pasatiempo);
                    },
                    updatePasatiempo: function () {
                        if (app.validar(app.clikedPasatiempo) == true) {
                            var FormData = app.toFormData(app.clikedPasatiempo);
                            axios.post("http://localhost/hojavida/apiPasatiempos.php?accion=actualizar", FormData)
                            .then(function (response) {
                                if (response.data.error) {
                                    app.errorMessage = response.data.message;
                                }
                                else {
                                    app.succesMessage = response.data.message;
                                    app.obtenerPasatiempos();
                                    $('#editModal').modal('hide');
                                    app.limpiarDatos();
                                }

                            });
                       }
                    },
                    deletePasatiempo: function() {
                        var FormData = app.toFormData(app.clikedPasatiempo);
                        axios.post("http://localhost/hojavida/apiPasatiempos.php?accion=eliminar", FormData)
                        .then(function (response) {
                            if (response.data.error) {
                                app.errorMessage = response.data.message;
                            }
                            else {
                                app.succesMessage = response.data.message;
                                app.obtenerPasatiempos();
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