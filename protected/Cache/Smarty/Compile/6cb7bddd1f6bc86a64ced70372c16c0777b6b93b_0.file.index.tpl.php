<?php
/* Smarty version 3.1.30, created on 2016-12-12 07:26:36
  from "E:\www\CarnetizacionSO\protected\view\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584e431c5c91c0_73284243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cb7bddd1f6bc86a64ced70372c16c0777b6b93b' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\index.tpl',
      1 => 1481523902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584e431c5c91c0_73284243 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'E:\\www\\CcMvc\\libs\\smarty-3.1.30\\libs\\plugins\\modifier.capitalize.php';
?>
<ol class="breadcrumb">
    <li class="active">Inicio</li>
    <li></li>
</ol>

<div class="container">
    <h1 class="text-center header2"><img src="src/images/admin.png">Bienvenido <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['session']->value['nombres_docente']);?>

        <br><small>
            <?php if ($_smarty_tpl->tpl_vars['session']->value['type_user'] == 'root') {?>
                (Administrador)
            <?php } else { ?>
                (Docente)
            <?php }?>

        </small>
    </h1>
    <ul  class="menu list-inline">
        <li> <a href="estudiante/insertar"><img src="src/images/agregar48.jpg"> Agregar Nuevo Estudiante</a></li>
        <li><a href="representante/"><img src="src/images/representante48.png"> Representantes</a></li>
        <li><a href="estudiante/"><img src="src/images/buscar48.jpg"> Buscar Estudiante</a></li>
        <li><a href="estudiante/CompruevaCarnet"><img src="src/images/carnet.png"> Verificar Carnet</a></li>
        <li><a href="estudiante/reportes"><img src="src/images/reporte.png"> Generar Reportes</a></li>

        <?php if ($_smarty_tpl->tpl_vars['session']->value['type_user'] == 'root') {?>
            <li><a href="docente/"><img src="src/images/reporte.png"> Docentes</a></li>

        <?php }?>


    </ul>

</div><?php }
}
