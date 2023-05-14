import Dropzone from "dropzone";


Dropzone.autoDiscover = false;


const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Upload your Image',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Delete',
    maxFiles: 1,
    uploadMultiple: false,


    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value
        }
    },

});



dropzone.on('success', function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('removedfile', function(){
    console.log('archivo eliminado')
});