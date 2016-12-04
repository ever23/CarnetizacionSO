<?php
/* Smarty version 3.1.30, created on 2016-12-01 03:12:12
  from "E:\www\CarnetizacionSO\protected\view\estudiante\reporte.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583f86fca36d88_07812520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e83b77067579564725791166e80b06fc3753f2f6' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\estudiante\\reporte.tpl',
      1 => 1480363168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f86fca36d88_07812520 (Smarty_Internal_Template $_smarty_tpl) {
?>


<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Estudiantes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Estudiantes <small><a href="<?php echo $_smarty_tpl->tpl_vars['dirPDf']->value;?>
" target="_blank" class="glyphicon glyphicon-print btn btn-danger"></a></small> </h1>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">  
            <form action="" method="GET"  class="btn-group">
                <?php if ($_smarty_tpl->tpl_vars['session']->value['type_user'] == 'root') {?>
                    <select name="type" class="btn btn-default">
                        <option value="NULL">Seccion</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['secciones']->value, 'seccion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['seccion']->value) {
?>

                            <option value="<?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select> 
                <?php } else { ?>
                    <input type="hidden" name="type" value='NULL'>
                <?php }?>

                <select name="discapacidad"  class="btn btn-default">

                    <option value="NULL">Discapacidad</option>
                    <option value="0">No Discapacitado</option>
                    <option value="true">Discapacitado</option>
                </select>


                <button class="btn btn-info glyphicon glyphicon-search " style="    background: rgba(245, 8, 8, 0.92);
                        border-color: rgba(245, 8, 8, 0.7);"></button>


            </form></div>
        <div class="col-sm-3"></div>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>

                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>sexo</th>
                <th>Grado</th>
                <th>Seccion</th>
                <th>Discapacidad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_objects['estudiante'][0]) ? $_smarty_tpl->smarty->registered_objects['estudiante'][0] : null;
if (!is_callable(array($_block_plugin1, 'each'))) {
throw new SmartyException('block tag \'estudiante\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('estudiante', array('row'=>'row'));
$_block_repeat1=true;
echo $_block_plugin1->each(array('row'=>'row'), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cedula_estu'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombres_estu'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['apellidos_estu'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['sexo_estu'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['grado_estu'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['seccion_estu'];?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['discapacidad_estu'];?>
</td> 


            </tr>
            <?php $_block_repeat1=false;
echo $_block_plugin1->each(array('row'=>'row'), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        </tbody>
    </table>



</div>
<?php }
}
