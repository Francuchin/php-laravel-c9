var videos = document.getElementsByClassName('video');
Array.prototype.forEach.call(videos, crearVideo);

function crearVideo(video, index) {

var media = video.getElementsByTagName('video')[0]; // video
var rango = video.getElementsByClassName('video_rango')[0]; // input range
var cargado = video.getElementsByClassName('video_cargado')[0]; // barra que muestra tiempo
var foto_btn = video.getElementsByClassName('foto_btn')[0];
var etiquetas = video.getElementsByClassName('etiqueta');

var div_r = document.createElement('div');
var img_r = document.createElement('img');
img_r.setAttribute('src', '/images/replay.png');
div_r.classList.add('img_replay');
div_r.appendChild(img_r);

var div_p = document.createElement('div');
var img_p = document.createElement('img');
img_p.setAttribute('src', '/images/play.png');
div_p.classList.add('img_play');
div_p.appendChild(img_p);

//video.insertBefore(div_r, video.firstChild);
video.insertBefore(div_p, video.firstChild);

rango.setAttribute("value", media.currentTime);
rango.setAttribute("max", "0");
rango.setAttribute("min", "0");
rango.setAttribute("step", "0.1");

media.addEventListener('play', function() {
    rango.max = media.duration;
    if (video.getElementsByClassName('img_replay')[0]) {
        video.removeChild(div_r);
    }
    ocultar_etiquetas();
});
media.addEventListener('timeupdate', function() {
    rango.value = media.currentTime;
    var porcentajeCargado = (media.currentTime) * 100 / (media.duration);
    cargado.style.width = porcentajeCargado + "%";
    cargado.style.backgroundColor = "hsl(208, 63%, " + (100 - porcentajeCargado / 2) + "%)";
    if (video.getElementsByClassName('img_replay')[0]) {
        video.removeChild(div_r);
    }
});
media.addEventListener('durationchange', function() {
    rango.max = media.duration;
});
media.addEventListener('ended', function() {
    rango.value = 0;
    video.insertBefore(div_r, video.firstChild);
    mostrar_etiquetas();
});

function ocultar_etiquetas() {
    if (etiquetas[0]) {
        Array.prototype.forEach.call(etiquetas, function(etiqueta, index) {
            etiqueta.style.visibility = 'hidden';
        });
    }
}

function mostrar_etiquetas() {
    if (etiquetas[0]) {
        Array.prototype.forEach.call(etiquetas, function(etiqueta, index) {
            etiqueta.style.visibility = 'visible';
        });
    }
}

function play_pausa() {
    if (media.paused) {
        media.play();
        cargado.style.opacity = null;
        div_p.style.opacity = 0;
        ocultar_etiquetas();
    } else {
        media.pause();
        cargado.style.opacity = 1;
        div_p.style.opacity = 1;
        mostrar_etiquetas();
    }
}
div_p.addEventListener('click', play_pausa);
media.addEventListener('click', play_pausa);
div_r.addEventListener('click', function() {
    play_pausa();
});

rango.addEventListener('input', function(e) {
    media.currentTime = rango.value;
});

if (foto_btn) {
    var input_captura = video.getElementsByClassName('captura')[0];
    foto_btn.addEventListener('click', function() {
        var canvas = document.createElement("canvas");
        canvas.setAttribute("width", media.videoWidth);
        canvas.setAttribute("height", media.videoHeight);
        canvas.getContext('2d').drawImage(media, 0, 0, media.videoWidth, media.videoHeight);
        if (!input_captura) {
            input_captura = document.createElement("input");
            input_captura.classList.add("captura");
            input_captura.setAttribute("name", "captura");
            input_captura.setAttribute("type", "hidden");
            input_captura.setAttribute("value", canvas.toDataURL());
            video.appendChild(input_captura);
        } else {
            input_captura.setAttribute("value", canvas.toDataURL());
        }
        if (input_captura.hasAttribute('onchange'))
            input_captura.onchange();
    });
}
}
/*----------NUEVA PARTICIPACION----------*/
var input_subir_video_participacion = document.getElementsByClassName('input_subir_video_participacion');
Array.prototype.forEach.call(input_subir_video_participacion, nueva_participacion_subir_video);

function nueva_participacion_subir_video(input, index) {
    input.addEventListener("change", subir_video_participacion, false);
};

function subir_video_participacion(e) {
    $(e.target).parent().parent().parent().dimmer('show');
    var formData = new FormData();
    formData.append("subir_video", e.target.files[0]);
    var request = new XMLHttpRequest();
    request.addEventListener('load', function() {
        if (this.status == 200) {
            var json = JSON.parse(this.response);
            if (!!json.resultado) {
                if (json.resultado == 'ok') {
                    $(e.target).parent().parent().parent().dimmer('hide');
                    crear_video_participacion(e.target.parentElement.parentElement.parentElement, json.ruta);
                } else {
                    console.log("Error 1");
                }
            } else {
                console.log("Error 2");
                if (!!json.subir_video) {
                    for (var error in json.subir_video) {
                        console.log("causa:", json.subir_video[error]);
                    }
                }
            }
        } else {
            console.log("Error 3");
        }
    });
    request.open("POST", "/subir_video", true);
    request.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");
    request.send(formData);
};

function crear_video_participacion(nodo, link_video) {

    var video_ruta = nodo.getElementsByClassName('nueva_participacion_video_txt')[0];
    video_ruta.setAttribute('value', link_video);
    var seccion_video = nodo.getElementsByClassName('nueva_participacion_video')[0];

    var vista_previa = document.createElement('div');
    var img_vista_previa = document.createElement('img');

    var video = document.createElement('div');
    var foto_btn = document.createElement('div');
    var video_media = document.createElement('video');
    var video_rango = document.createElement('input');
    var video_cargado = document.createElement('div');
    var captura = document.createElement('input');

    vista_previa.classList.add('vista_previa');
    //img_vista_previa.classList.add('img_previa');
    video.classList.add('video');
    foto_btn.classList.add('foto_btn');
    video_media.classList.add('video_contenido');
    video_rango.classList.add('video_rango');
    video_cargado.classList.add('video_cargado');
    captura.classList.add('captura');


    //vista_previa.setAttribute('id','vista_previa');
    //img_vista_previa.setAttribute('id','img_previa');
    //captura.setAttribute('id','captura');
    captura.setAttribute('name', 'captura');
    //video_media.setAttribute('id', 'nuevo_desafio_video');
    video_rango.setAttribute('type', 'range');
    captura.setAttribute('type', 'hidden');
    video_media.setAttribute('src', link_video);

    foto_btn.innerHTML = "captura";
    captura.setAttribute('onchange', 'javascript:actualizaimagenParticipacion(this)');

    vista_previa.appendChild(img_vista_previa);
    video.appendChild(foto_btn);
    video.appendChild(video_media);
    video.appendChild(video_rango);
    video.appendChild(video_cargado);
    video.appendChild(captura);

    seccion_video.innerHTML = "";
    seccion_video.appendChild(vista_previa);
    seccion_video.appendChild(video);
    crearVideo(video);

}

function actualizaimagenParticipacion(elemento) {
    elemento.parentElement.parentElement.parentElement.getElementsByClassName('nueva_participacion_captura_txt')[0].setAttribute('value', elemento.value);
    var vp = elemento.parentElement.parentElement.getElementsByClassName('vista_previa')[0];
    vp.getElementsByTagName('img')[0].setAttribute('src', elemento.value);
    vp.style.opacity = 0.9;
}
/*----------------NUEVO DESAFIO-----------------*/
if (!!document.getElementById("subir_video"))
    document.getElementById("subir_video").addEventListener("change", subir_video, false);

function subir_video() {
    document.getElementById("progreso").innerHTML = "<div class='ui active inverted dimmer'><div class='ui large text loader'>Subiendo Video</div></div>";

    var formData = new FormData(document.querySelector('#formulario_subir_video'));
    var request = new XMLHttpRequest();

    request.onreadystatechange = function(e) {
        console.log("onreadystatechange: ", request.readyState, request.response);

    };
    request.addEventListener("progress", function(e) {
        console.log(e);
    });


    request.addEventListener('load', function() {
        if (this.status == 200) {
            var json = JSON.parse(this.response);
            if (!!json.resultado) {
                if (json.resultado == 'ok') {
                    document.getElementById("progreso").innerHTML = "";
                    add_video(json.ruta);
                } else {
                    var mensaje = "<div class='ui active dimmer'>";
                    mensaje += "<div class='content'>";
                    mensaje += "<div class='center'>";
                    mensaje += "<h2 class='ui inverted header'>ERROR 3: no se pudo subir el video</h2>";
                    mensaje += "</div></div></div>";
                    document.getElementById("progreso").innerHTML = mensaje;
                }
            } else {
                var mensaje = "<div class='ui active dimmer'>";
                mensaje += "<div class='content'>";
                mensaje += "<div class='center'>";
                mensaje += "<h2 class='ui inverted header'>ERROR 2: no se pudo subir el video</h2>";
                if (!!json.subir_video) {
                    mensaje += "<ul>";
                    for (var error in json.subir_video) {
                        mensaje += "<li class='ui inverted' >" + json.subir_video[error] + "</li>";
                    }
                    mensaje += "</ul>";
                }
                mensaje += "</div></div></div>";
                document.getElementById("progreso").innerHTML = mensaje;
            }
        } else {
            document.getElementById("progreso").innerHTML = "<div class='ui active dimmer'><div class='content'>ERROR 1: no se pudo subir el video</div></div>";
        }
    });
    request.open("POST", "/subir_video", true);
    request.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");
    request.send(formData);

}

function actualizaimagen() {
    document.getElementById('img_previa').setAttribute('src', document.getElementById('captura').value);
    document.getElementById('form_input_captura').setAttribute('value', document.getElementById('captura').value);
    document.getElementById('vista_previa').style.opacity = 0.9;
}

function add_video(ruta_video) {

    var crear_challenge_video = document.getElementById('crear_challenge_video');
    var formulario_crear_desafio = document.getElementById('formulario_crear_desafio');
    document.getElementById('form_input_video').setAttribute('value', ruta_video);
    var vista_previa = document.createElement('div');
    var img_vista_previa = document.createElement('img');

    var video = document.createElement('div');
    var foto_btn = document.createElement('div');
    var video_media = document.createElement('video');
    var video_rango = document.createElement('input');
    var video_cargado = document.createElement('div');
    var captura = document.createElement('input');
    var ruta = document.createElement('input');

    vista_previa.classList.add('vista_previa');
    //img_vista_previa.classList.add('img_previa');
    video.classList.add('video');
    foto_btn.classList.add('foto_btn');
    video_media.classList.add('video_contenido');
    video_rango.classList.add('video_rango');
    video_cargado.classList.add('video_cargado');
    captura.classList.add('captura');

    foto_btn.innerHTML = "captura";

    vista_previa.setAttribute('id', 'vista_previa');
    img_vista_previa.setAttribute('id', 'img_previa');
    captura.setAttribute('id', 'captura');
    captura.setAttribute('name', 'captura');
    ruta.setAttribute('name', 'video');
    video_media.setAttribute('id', 'nuevo_desafio_video');
    video_rango.setAttribute('type', 'range');
    captura.setAttribute('type', 'hidden');
    ruta.setAttribute('type', 'hidden');
    ruta.setAttribute('value', ruta_video);
    video_media.setAttribute('src', ruta_video);
    captura.setAttribute('onchange', 'javascript:actualizaimagen()');

    vista_previa.appendChild(img_vista_previa);
    video.appendChild(foto_btn);
    video.appendChild(video_media);
    video.appendChild(video_rango);
    video.appendChild(video_cargado);
    video.appendChild(ruta);
    video.appendChild(captura);

    crear_challenge_video.innerHTML = "";
    crear_challenge_video.appendChild(vista_previa);
    crear_challenge_video.appendChild(video);
    crearVideo(video);
}