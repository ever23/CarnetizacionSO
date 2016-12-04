<?php
/* Smarty version 3.1.30, created on 2016-11-30 04:29:21
  from "E:\www\CarnetizacionSO\protected\view\estudiante\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583e4791605897_37703953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b485548d053b698d5871894c3eb23eec25c865c' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\estudiante\\index.tpl',
      1 => 1480363067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583e4791605897_37703953 (Smarty_Internal_Template $_smarty_tpl) {
?>


<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Estudiantes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Estudiantes </h1>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">   <form action="" method="GET"  class="input-group">
                <input type="search" class="form-control" placeholder="Buscar" name='q' style="    min-width: 30%;"  value="">
                <span class="input-group-btn">
                    <button class="btn btn-info glyphicon glyphicon-search " style="    background: rgba(245, 8, 8, 0.92);
                            border-color: rgba(245, 8, 8, 0.7);"></button>
                </span>

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
                <th></th>
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
                <td><a href="estudiante/info?id_estu=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_estu'];?>
" class="glyphicon glyphicon-info-sign"></a></td>
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['type_user'] == 'root') {?>
                    <td><a href="estudiante/editar?id_estu=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_estu'];?>
" class="glyphicon glyphicon-edit"></a></td>
                    <td><a href="estudiante/eliminar?id_estu=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_estu'];?>
" class="glyphicon glyphicon-remove"></a></td>
                    <?php }?>
            </tr>
            <?php $_block_repeat1=false;
echo $_block_plugin1->each(array('row'=>'row'), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        </tbody>
    </table>



</div><?php }
}
