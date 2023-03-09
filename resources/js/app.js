import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;


const dropzone = new Dropzone( "#dropzone", {
  dictDefaultMessage: "Sube aquí tu imagen",
  acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp, .svg",
  addRemoveLinks: true,
  dictRemoveFile: "Eliminar",
  maxFiles: 1,
  uploadMultiple: false,

  init: function () {
    if ( document.getElementById( "imagen" ).value ) {
      const imagenPublicada = {};
      imagenPublicada.size = 1234;
      imagenPublicada.name = document.getElementById( "imagen" ).value;

      this.options.addedfile.call( this, imagenPublicada );
      this.options.thumbnail.call( this, imagenPublicada, "/uploads/" + imagenPublicada.name );
      imagenPublicada.previewElement.classList.add( "dz-success", 'dz-complete' );
    }
  }
} );


dropzone.on( "success", function ( file, response ) {
  document.getElementById( "imagen" ).value = response.imagen;
} );

dropzone.on( "removedfile", function () {
  document.getElementById( "imagen" ).value = "";
} );
