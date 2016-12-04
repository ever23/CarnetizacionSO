<?php
/* Smarty version 3.1.30, created on 2016-11-30 04:43:09
  from "E:\www\CarnetizacionSO\protected\view\estudiante\form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583e4acdaf9df3_49710104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f06a44629550c626ed5a018a9a6a3b740a526eab' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\estudiante\\form.tpl',
      1 => 1480477373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583e4acdaf9df3_49710104 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</li>
</ol>

<?php echo '<script'; ?>
 type="text/javascript" src="src/js/webcam.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">


    <?php if ($_smarty_tpl->tpl_vars['type']->value == 'agregar') {?>
    var ajax_uri = 'estudiante/guardar';
    <?php } else { ?>
    var ajax_uri = 'estudiante/guardar?id_estu=<?php echo $_smarty_tpl->tpl_vars['id_estu']->value;?>
';
    <?php }?>
    
        var cam_ini = false;
        var shutter = new Audio();
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
                    console.log(image_data_uri);
                    return;
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
            shutter.play();
            Webcam.freeze();
        }

        function cancel_preview() {

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

    
<?php echo '</script'; ?>
>

<div class="container">
    <h1 class="header2 text-center"><img src="src/images/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
24.jpg"><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
 </h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_objects['form'][0]) ? $_smarty_tpl->smarty->registered_objects['form'][0] : null;
if (!is_callable(array($_block_plugin1, 'Form'))) {
throw new SmartyException('block tag \'form\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('form', array('class'=>"form-control"));
$_block_repeat1=true;
echo $_block_plugin1->Form(array('class'=>"form-control"), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

            <?php if ($_smarty_tpl->tpl_vars['type']->value == 'agregar') {?>
                <input type="hidden" name="type" value="insertar">
            <?php } else { ?>
                <input type="hidden" name="type" value="editar">

            <?php }?>
            <ul>
                <li class="FormRow">   <label>C.I del Representante </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"id_repre"),$_smarty_tpl);?>

                    <?php if ($_smarty_tpl->tpl_vars['type']->value == 'agregar') {?>
                        <small class=""><a href="representante/insertar?ref=estudiante/insertar" class="btn btn-info">Insertar</a></small></li>
                    <?php }?>
                <li class="FormRow">
                    <label>Cedula Estudiantil </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"cedula_estu"),$_smarty_tpl);?>

                </li>
                <li class="FormRow">
                    <label>Nombres </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"nombres_estu"),$_smarty_tpl);?>

                </li>
                <li class="FormRow">
                    <label>Apellidos </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"apellidos_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Fecha de Nacimiento </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"nacimiento_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Sexo </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Select(array('name'=>"sexo_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Enfermedad </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"enfermedad_estu",'placeholder'=>"Si no posee dejar en blanco"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Discapacidad </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"discapacidad_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Grado </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Select(array('name'=>"grado_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Seccion </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"seccion_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Turno </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Select(array('name'=>"turno_estu"),$_smarty_tpl);?>
</li>
                <li class="FormRow">   <label>Fecha de Ingreso </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"ingreso_estu"),$_smarty_tpl);?>
</li>


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
                <li class="FormRow text-center" ><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->ButtonSubmit(array('class'=>"btn btn-success enviar",'value'=>"<spam class='glyphicon glyphicon-send'></spam>Guardar"),$_smarty_tpl);?>
</li>
            </ul>

            <?php $_block_repeat1=false;
echo $_block_plugin1->Form(array('class'=>"form-control"), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>



        </div>
        <div class="col-md-1 "></div>
    </div>
    <div id="error"></div>


</div><?php }
}
