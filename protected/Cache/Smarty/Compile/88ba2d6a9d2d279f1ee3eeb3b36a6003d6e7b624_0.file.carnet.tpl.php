<?php
/* Smarty version 3.1.30, created on 2016-12-12 06:18:15
  from "E:\www\CarnetizacionSO\protected\view\estudiante\carnet.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584e331711a7f4_84526775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88ba2d6a9d2d279f1ee3eeb3b36a6003d6e7b624' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\estudiante\\carnet.tpl',
      1 => 1481519891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584e331711a7f4_84526775 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ol class="breadcrumb">
    <li ><a href="">Inicio</a></li>
    <li ><a href="estudiante/">Estudiantes</a></li>
    <li ><a href="estudiante/info?id_estu=<?php echo $_smarty_tpl->tpl_vars['id_estu']->value;?>
">informacion</a></li>
    <li class="active">Carnet</li>
</ol>


<div class="container">
    <h1 class="text-center header2">Carnet Estudiantil
        <small><a href="<?php echo $_smarty_tpl->tpl_vars['dirPDf']->value;?>
" id="imprimir" target="_blank" class="glyphicon glyphicon-print btn btn-danger"></a></small> 
    </h1>
    <div  style="margin-left: auto;margin-right: auto;width: 490px;">
        <div id="carnet" style="border: 3px solid ; border-style: dashed; float: left; padding: 2px; width: 238px;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['carnet']->value;?>
"  class="img-rounded">
        </div>
        <div id="carnet" style="border: 3px solid ; float: right; border-style: dashed;padding: 2px;  width: 238px;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['backcarnet']->value;?>
"  class="img-rounded">
        </div>
    </div>

</div><?php }
}
