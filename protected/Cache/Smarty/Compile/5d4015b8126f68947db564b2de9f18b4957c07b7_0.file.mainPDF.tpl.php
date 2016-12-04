<?php
/* Smarty version 3.1.30, created on 2016-12-02 00:22:12
  from "E:\www\CarnetizacionSO\protected\layauts\mainPDF.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5840b0a47a1e83_97412928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d4015b8126f68947db564b2de9f18b4957c07b7' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\layauts\\mainPDF.tpl',
      1 => 1480631701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5840b0a47a1e83_97412928 (Smarty_Internal_Template $_smarty_tpl) {
?>


<!doctype html>
<html>
    <head>
        <?php echo $_smarty_tpl->tpl_vars['this']->value->GetContenHead();?>


        <link  rel='stylesheet' href='src/css/bootstrap.min.css' media='screen'/>
        <link  rel='stylesheet' href='src/css/styles.css' media='screen'/>
        <style type="text/css">

            @page
            {
                margin: 0px !important;
                padding-top: 200px;
            }
            body {

                background-size: 600px 892px !important;
            }
            .breadcrumb, form,#cargando
            {
                display: none !important;
            }
            .main_conten
            {
                margin-bottom: 0px;
                margin-top: -200px;
                padding-top: 400px;
                padding-left: 0px;
                padding-right: 0px;
            }
        </style>

    </head>
    <body>

        <header class="navbar
                shadow navbar-fixed-top" > 
            <img src="src/images/logo_unefa.png" class="pull-left" style="margin-left: 100px;">
            <img src="src/images/escuela.jpg" width="59" height="80" class="pull-right" style="margin-right: 100px;">
            <h1 class="text-center">Sistema de Carnetización Safe Off</h1> 
        </header>

        <div class=" main_conten">

            <div class="container"> 
                <!--  contenido proveniente de el controlador y los views  -->

                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </div>
        </div> 
        <footer style="margin: 0px" class="text-center navbar-fixed-bottom"> 
            <div class="text-center">&COPY; Grupo Escolar Diego Bustilos.
                Todos los derechos no reservados (Grupo Unefa).
                2016</div>
        </footer>

    </body>
</html>


<?php }
}
