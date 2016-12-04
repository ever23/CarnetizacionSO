<?php
/* Smarty version 3.1.30, created on 2016-11-30 04:28:57
  from "E:\www\CarnetizacionSO\protected\layauts\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583e47790eb514_29213997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e1c78c51cfc21de2635cbcb70daa0c4333fc724' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\layauts\\main.tpl',
      1 => 1480444810,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583e47790eb514_29213997 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['this']->value->GetContenHead();?>

        <?php echo '<script'; ?>
  src='src/js/jquery-3.1.0.min.js' type='text/javascript'><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
  src='src/js/bootstrap.min.js' type='text/javascript'><?php echo '</script'; ?>
>
        <link  rel='stylesheet' href='src/css/bootstrap.min.css' media='screen'/>
        <link  rel='stylesheet' href='src/css/styles.css' media='screen'/>
        <!--[if lt IE 9]>
            <?php echo '<script'; ?>
 src="src/js/html5.js"><?php echo '</script'; ?>
>
        <![endif]-->
        <!--[if IE]>
             <?php echo '<script'; ?>
 src="src/js/html5shiv.js"><?php echo '</script'; ?>
>
        <![endif]-->
        <?php echo '<script'; ?>
 type="text/javascript">
            $(window).on('load', function () {
                $('#cargando').fadeOut();
            });

        <?php echo '</script'; ?>
>
    </head>
    <body>
        <header class="navbar navbar-default  shadow" > 
            <img src="src/images/logo_unefa.png" class="pull-left" style="margin-left: 100px;">
            <img src="src/images/escuela.jpg" width="59" height="80" class="pull-right" style="margin-right: 100px;">
            <h1 class="text-center">Sistema de Carnetización Safe Off</h1> 
        </header>
        <div class=" main_conten">
            <div id="cargando"></div>
            <div class="container"> 
                <?php if ($_smarty_tpl->tpl_vars['this']->value->errores) {?>
                    <small>
                        <div  class='alert text-center alert-danger' role='alert'>
                            <span  class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
                            <?php echo $_smarty_tpl->tpl_vars['this']->value->errores;?>
</div></small>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
                    <small>
                        <div  class='alert text-center alert-info' role='alert'>
                            <span  class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
                            <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div></small>
                        <?php }?>
                <!--  contenido proveniente de el controlador y los views  -->

                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </div>
        </div> 
        <div class="page-header"></div>
        <footer style="margin: 0px; padding-left: 20px; padding-right: 25px;" class="text-center"> 
            <div class="row">
                <div class="col-md-4">
                    <?php if (!empty($_smarty_tpl->tpl_vars['session']->value)) {?>
                        <?php if ($_smarty_tpl->tpl_vars['session']->value->IsUser()) {?>
                            Hola <?php echo $_smarty_tpl->tpl_vars['session']->value['nombres_docente'];?>
 Deseas<br> 
                            <div class="btn-group">
                                <a href="docente/CambiarContrasena" class="btn btn-info">
                                    Cambia la contraseña
                                </a>
                                <a href="user/close" class="btn btn-danger">
                                    Cerrar session
                                </a>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-md-4 text-center">
                    &COPY; Grupo Escolar Diego Bustilos.
                    Todos los derechos reservados (Grupo Unefa).
                    2016
                </div>
                <div class="col-md-4">


                </div>
            </div>
            <div class="text-center"></div>
        </footer>
    </body>
</html>


<?php }
}
