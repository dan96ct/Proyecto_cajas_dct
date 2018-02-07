function comprobarLejas(estanteria) {
    objetoAjax = AJAXCrearObjeto(); //crea el objeto
    objetoAjax.open('GET', "/Proyecto_cajas_dct/controlador/controladorDarPosicionCaja_AJAX.php?estanteria=" + estanteria);
    objetoAjax.send();
    objetoAjax.onreadystatechange = function () {
        if (objetoAjax.readyState === 4 && objetoAjax.status === 200) {
            var datos = objetoAjax.responseText;
            var objeto = JSON.parse(datos);
            $('#lista_posicion').empty();
            for (var i = 0; i < objeto.length; i++) {
                $('#lista_posicion').append('<option>' + objeto[i] + '</option>');
            }
        }
    }
}
function getCodigoCajas() {
    objetoAjax = AJAXCrearObjeto(); //crea el objeto
    objetoAjax.open('GET', "/Proyecto_cajas_dct/controlador/controladorGetCodigoCajas_AJAX.php");
    objetoAjax.send();
    objetoAjax.onreadystatechange = function () {
        if (objetoAjax.readyState === 4 && objetoAjax.status === 200) {
            var datos = objetoAjax.responseText;
            var objeto = JSON.parse(datos);
            if (objeto.length === 0) {
                document.getElementById("cajasLista").disabled = true;
                var placeHolder = document.createAttribute("placeholder");
                placeHolder.value = "Funcion no disponible";
                document.getElementById("cajasLista").setAttributeNode(placeHolder);
                $('#botonVenderCaja').attr("disabled", true);

            } else {
                var datalist = document.getElementById("cajas");
                for (var i = 0; i < objeto.length; i++) {
                    var nodo = document.createElement("option");
                    nodo.value = objeto[i];
                    datalist.appendChild(nodo);
                }
            }
        }
    }
}
function cargarAJAX(estanteria) {
    objetoAjax2 = AJAXCrearObjeto(); //crea el objeto
    objetoAjax2.open('GET', "/Proyecto_cajas_dct/controlador/controladorGetCajasVendidas_AJAX.php");
    objetoAjax2.send();
    objetoAjax2.onreadystatechange = function () {
        if (objetoAjax2.readyState === 4 && objetoAjax2.status === 200) {
            var datos = objetoAjax2.responseText;
            var objeto = JSON.parse(datos);
            if (objeto.length === 0) {
                document.getElementById("listaCajasVendidas").disabled = true;
                var placeHolder = document.createAttribute("placeholder");
                placeHolder.value = "Funcion no disponible";
                document.getElementById("listaCajasVendidas").setAttributeNode(placeHolder);
                $('#botonDevolverCaja').attr("disabled", true);

            } else {
                var datalist = document.getElementById("cajasVendidas");
                for (var i = 0; i < objeto.length; i++) {
                    var nodo = document.createElement("option");
                    nodo.value = objeto[i];
                    datalist.appendChild(nodo);
                }
            }
            comprobarLejas(estanteria);
        }
    }
}
function AJAXCrearObjeto() {
    if (window.XMLHttpRequest) {
// navegadores que siguen los estándares
        objetoAjax = new XMLHttpRequest();
    } else {
// navegadores obsoletos
        objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return objetoAjax;
}