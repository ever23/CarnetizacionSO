<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li>{$h1}</li>
</ol>

<script type="text/javascript" src="src/js/webcam.js"></script>
<script type="text/javascript">


    {if $type=='agregar'}
    var ajax_uri = 'estudiante/guardar';
    {else}
    var ajax_uri = 'estudiante/guardar?id_estu={$id_estu}';
    {/if}
    {literal}
        var cam_ini = false;
        var shutter = new Audio();
        var Foto = false;
        shutter.autoplay = false;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'src/shutter.ogg' : 'src/shutter.mp3';
        $(document).ready(function () {



            $('.enviar').click(function (e) {
                if (cam_ini) {
                    e.preventDefault();
                } else {
                    return;
                }

                // actually snap photo (from preview freeze) and display it
                Webcam.snap(function (image_data_uri) {
                    //console.log(image_data_uri);
                    // return;
                    if (!Foto) {
                        alert("Porfavor tome una foto Presionando el boton 'Tomar Foto' ");
                        return;
                    }
                    var image_fmt = '';
                    if (image_data_uri.match(/^data\:image\/(\w+)/))
                        image_fmt = RegExp.$1;
                    else {
                        alert("Porfavor tome una foto Presionando el boton 'Tomar Foto' ");
                        return;
                    }
                    var raw_image_data = image_data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
// create a blob and decode our base64 to binary
                    var blob = new Blob([Webcam.base64DecToArr(raw_image_data)], {type: 'image/' + image_fmt});
                    // stuff into a form, so servers can easily receive it as a standard file upload
                    var form = new FormData($('form')[0]);
                    // form.delete('id_foto');
                    form.append('id_foto', blob, 'id_foto' + "." + image_fmt.replace(/e/, ''));
                    form.append('ajax', 'true');
                    $('#cargando').fadeIn();

                    $.ajax(ajax_uri,
                    {
                        contentType: false,
                        processData: false,
                        data: form,
                        // especifica si será una petición POST o GET
                        type: 'POST',
                        // el tipo de información que se espera de respuesta
                        dataType: 'json',
                        success: function (json) {
                            // console.log(json);
                            // return;
                            $('#cargando').fadeOut();
                            if (!json.error) {

                                alert(json.mensaje);
                                window.location.href = json.location;
                            } else {
                                alert(json.error);
                            }

                        },
                        error: function (jqXHR, status, error) {
                            console.log(error);
                            $('#cargando').fadeOut();
                        }
                    });
                });
            });
        });
        function preview_snapshot() {
            // freeze camera so user can preview pic
            Foto = true;
            shutter.play();
            Webcam.freeze();
        }

        function cancel_preview() {
            Foto = false;
            // cancel preview freeze and return to live camera feed
            Webcam.unfreeze();
        }
        function iniciar_cam() {
            Webcam.set({
                width: 320,
                height: 240,
                dest_width: 320,
                dest_height: 240,
                // final cropped size
                crop_width: 320,
                crop_height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#my_camera');
            cam_ini = true;
        }

    {/literal}
</script>

<div class="container">
    <h1 class="header2 text-center"><img src="src/images/{$type}24.jpg">{$h1} </h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            {form->Form class="form-control"}
            {if $type=='agregar'}
                <input type="hidden" name="type" value="insertar">
            {else}
                <input type="hidden" name="type" value="editar">

            {/if}
            <ul>
                <li class="FormRow">   <label>C.I del Representante </label>{form->Input name="id_repre"}
                    {if $type=='agregar'}
                        <small class=""><a href="representante/insertar?ref=estudiante/insertar" class="btn btn-info">Insertar</a></small></li>
                    {/if}
                <li class="FormRow">
                    <label>Cedula Estudiantil </label>
                    {form->Input name="cedula_estu"}
                </li>
                <li class="FormRow">
                    <label>Nombres </label>
                    {form->Input name="nombres_estu"}
                </li>
                <li class="FormRow">
                    <label>Apellidos </label>
                    {form->Input name="apellidos_estu"}</li>
                <li class="FormRow">   <label>Fecha de Nacimiento </label>{form->Input name="nacimiento_estu"}</li>
                <li class="FormRow">   <label>Sexo </label>{form->Select name="sexo_estu"}</li>
                <li class="FormRow">   <label>Enfermedad </label>{form->Input name="enfermedad_estu" placeholder="Si no posee dejar en blanco"}</li>
                <li class="FormRow">   <label>Discapacidad </label>{form->Input name="discapacidad_estu"}</li>
                <li class="FormRow">   <label>Grado </label>{form->Select name="grado_estu"}</li>
                <li class="FormRow">   <label>Seccion </label>{form->Input name="seccion_estu"}</li>
                <li class="FormRow">   <label>Turno </label>{form->Select name="turno_estu"}</li>
                <li class="FormRow">   <label>Fecha de Ingreso </label>{form->Input name="ingreso_estu"}</li>


                <li class="FormRow text-center">   
                    <div class="img-rounded img-thumbnail" style="margin-left: auto; margin-right: auto;">
                        <div id="my_camera" style="margin-left: auto; margin-right: auto;"></div>

                        <div class="btn btn-group">
                            <div class="btn btn-info" onclick="iniciar_cam()">Iniciar Camara</div>
                            <div class="btn btn-success" onclick="preview_snapshot()">Tomar Foto</div>
                            <div class="btn btn-danger" onclick="cancel_preview()">Descartar Foto</div>
                        </div>
                    </div>
                </li>
                <li class="FormRow text-center" >{form->ButtonSubmit class="btn btn-success enviar" value="<spam class='glyphicon glyphicon-send'></spam>Guardar" }</li>
            </ul>

            {/form->Form}


        </div>
        <div class="col-md-1 "></div>
    </div>
    <div id="error"></div>


</div>