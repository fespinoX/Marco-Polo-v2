/* Mostrar imagen al cargarla en el formulario */

    var imgSrc = document.getElementById('fotosrc');

    if( imgSrc !== null ) {
        imgSrc.onchange = function (evt) {

            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    console.log(fr);
                    document.getElementById('fotoprev').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        }
    }