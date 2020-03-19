
var app = new Vue({
    el: '#appCandidatos',
    data: {
        seleccionoFoto: '',
        imageData: '',
        errorMessage: '',
        succesMessage: '',
        candidatos: [],
        newCandidato: {
            identidad: '',
            nombres: '',
            apellidos: '',
            profesion: '',
            sexo: '',
            fechanac: '',
            estadocivil: '',
            pareja: '',
            nacionalidad: '',
            acerca: '',
            direccion: '',
            foto: ''
        },
        ClickedCandidato: {},
    },
    mounted: function () {
        this.obtenerCandidatos();
    },
    methods:
    {
        obtenerCandidatos: function () {
            axios.get("http://localhost/hojavida/apiCandidato.php?accion=lectura")
                .then(function (response) {
                    if (response.data.error) {
                        app.errorMessage = response.data.message;
                    }
                    else {
                        app.candidatos = response.data.candidatos;
                    }
                });
        },
        previewImage: function (event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                    this.seleccionoFoto = true;
                    this.newCandidato.foto = input.files[0];
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        },
        limpiarDatos: function () {
            this.seleccionoFoto = false;
            this.newCandidato = {
                identidad: '',
                nombres: '',
                apellidos: '',
                profesion: '',
                sexo: '',
                fechanac: '',
                estadocivil: '',
                pareja: '',
                nacionalidad: '',
                acerca: '',
                foto: ''
            };
        },
        validar: function (Candidato) {
            var respuesta = true;
            if (Candidato.identidad == '') {
                alert("Escriba el numero de identidad");
                respuesta = false;

            }
            else if (Candidato.nombres == '') {
                alert("Escriba sus nombres");
                respuesta = false;
            }
            else if (Candidato.apellidos == '') {
                alert("Escriba sus apellidos");
                respuesta = false;
            }
            else if (Candidato.sexo == '') {
                alert("Seleccione su sexo( Masculino o Femenino");
                respuesta = false;
            }
            else if (Candidato.fechanac == '') {
                alert("Indique su fecha de nacimiento");
                respuesta = false;
            }
            else if (Candidato.estadocivil == "Unión libre" && Candidato.pareja == '') {
                alert("Debe escribir el nombre de la peraja");
                respuesta = false;
            }
            else if (Candidato.estadocivil == "Casado" && Candidato.pareja == '') {
                alert("Debe escribir el nombre de la peraja");
                respuesta = false;

            }
            else if (Candidato.nacionalidad == '') {
                alert("Para guardar informacion debe de ingresar su nacionalidad");
                respuesta = false;
            }
            else if (Candidato.profesion == '') {
                alert("Debe ingresar su profesión");
                respuesta = false;
            }
            else if (Candidato.direccion == '') {
                alert("Debe ingresar su dirección");
                respuesta = false;
            }
            else if (Candidato.acerca == '') {
                alert("Aqui puede ingresar algo relevante");
                respuesta = false;
            }
          else if (Candidato.foto == '') {
                alert("Seleccione una foto de su ordenador para poder guardar la informacion");
                respuesta = false;
            } 


            return respuesta;
        },
        insertCandidato: function () {
            if (app.validar(app.newCandidato) == true) {
                var FormData=app.toFormData(app.newCandidato);
                axios.post("http://localhost/hojavida/apiCandidato.php?accion=crear",FormData, {
                    headers:{
                        'Content-Type':'multipart/form-data'
                    }
                })
                .then(function(response){
                    if (response.data.error)
                    {
                        app.errorMessage=response.data.message;
                    }
                    else
                    {
                        app.succesMessage=response.data.message;
                        app.obtenerCandidatos();
                        $('#createModal').modal('hide');
                        app.limpiarDatos();
                    }
                     
                });
            }
        },
        toFormData: function(obj){
            var form_data=new FormData();
            for (var key in obj)
            {
                form_data.append(key, obj[key]);

            }
            return form_data;
        },
        selectCandidato:function(candidato)
        {
            app.ClickedCandidato= $.extend({},candidato ) ;
        },
        updateCandidato:function ()
        {
            if (app.validar(app.ClickedCandidato) == true) {
                var FormData=app.toFormData(app.ClickedCandidato);
                axios.post("http://localhost/hojavida/apiCandidato.php?accion=actualizar",FormData  )
                .then(function(response){
                    if (response.data.error)
                    {
                        app.errorMessage=response.data.message;
                    }
                    else
                    {
                        app.succesMessage=response.data.message;
                        app.obtenerCandidatos();
                        $('#editModal').modal('hide');
                        app.limpiarDatos();
                    }
                     
                });
            }
        },
        deleteCandidato:function ()
        {
            var FormData=app.toFormData(app.ClickedCandidato);
            axios.post("http://localhost/hojavida/apiCandidato.php?accion=eliminar",FormData  )
            .then(function(response){
                if (response.data.error)
                {
                    app.errorMessage=response.data.message;
                }
                else
                {
                    app.succesMessage=response.data.message;
                    app.obtenerCandidatos();
                    $('#deleteModal').modal('hide');
                    app.limpiarDatos();
                }
                    
            });
            
        },
    }

});