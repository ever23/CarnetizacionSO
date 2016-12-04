<?php
/* Smarty version 3.1.30, created on 2016-11-30 04:32:15
  from "E:\www\CarnetizacionSO\protected\view\estudiante\info.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583e483f6045e6_66379161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8591310831f51f0348dd62ab5138b940483461b6' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\estudiante\\info.tpl',
      1 => 1480366633,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583e483f6045e6_66379161 (Smarty_Internal_Template $_smarty_tpl) {
?>


<ol class="breadcrumb" >
    <li><a href="">Inicio</a></li>
    <li ><a href="estudiante/">Estudiante</a></li>
    <li class="active">Informacion</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Estudiante <a href="estudiante/carnet?id_estu=<?php echo $_smarty_tpl->tpl_vars['estudiante']->value['id_estu'];?>
" title="Carnet" class="btn btn-info"><img src="src/images/carnet.png?GDw=30"></a></h1>
    <div class="row">
        <div class="col-md-4">
            <img src="fotos/?id_foto=<?php echo $_smarty_tpl->tpl_vars['estudiante']->value['id_foto'];?>
&GDw=200" class="img-responsive img-rounded">

        </div>
        <div class="col-md-8">
            <table class="table ">
                <tbody>
                    <tr>
                        <td width="200" ><b>Cedula</b></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['estudiante']->value['cedula_estu'];?>
</td>
                    </tr>
                    <tr>
                        <td width="200" ><b>Nombres</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['nombres_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Apellidos</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['apellidos_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Edad</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['edad'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de Nacimiento</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['nacimiento_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Sexo</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['sexo_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Enfermedad</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['enfermedad_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Discapacidad</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['discapacidad_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de ingreso</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['ingreso_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Grado</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['grado_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Seccion</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['seccion_estu'];?>
 </td>
                    </tr>
                    <tr>
                        <td><b>Turno</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['estudiante']->value['turno_estu'];?>
 </td>
                    </tr>
                </tbody>
            </table>
            <h3 class="text-center">Representante</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td ><b>C.I</b></td>
                        <td>:<?php echo $_smarty_tpl->tpl_vars['representante']->value['id_repre'];?>
 </td>
                    </tr>
                    <tr>
                        <td ><b>Nombres</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['representante']->value['nombres_repre'];?>
</td>
                    </tr>
                    <tr>
                        <td ><b>Apellidos</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['representante']->value['apellidos_repre'];?>
</td>
                    </tr>
                    <tr>
                        <td ><b>Telefono</b></td>
                        <td>: <?php echo $_smarty_tpl->tpl_vars['representante']->value['telefono_repre'];?>
</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>






</div><?php }
}
