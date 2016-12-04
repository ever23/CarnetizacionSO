<?php
/* Smarty version 3.1.30, created on 2016-12-01 02:31:00
  from "E:\www\CarnetizacionSO\protected\view\representante\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583f7d54471805_22728241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7668e247928d09748250ff7e147a2c0f462932f' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\representante\\index.tpl',
      1 => 1480166268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f7d54471805_22728241 (Smarty_Internal_Template $_smarty_tpl) {
?>


<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Representantes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Representantes </h1>
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
                <th>C.I</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th></th>
                <th></th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_objects['representante'][0]) ? $_smarty_tpl->smarty->registered_objects['representante'][0] : null;
if (!is_callable(array($_block_plugin1, 'each'))) {
throw new SmartyException('block tag \'representante\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('representante', array('row'=>'row'));
$_block_repeat1=true;
echo $_block_plugin1->each(array('row'=>'row'), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id_repre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombres_repre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['apellidos_repre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['telefono_repre'];?>
</td> 
                <td><a href="representante/info?id_repre=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_repre'];?>
" class="glyphicon glyphicon-info-sign"></a></td> 
                    <?php if ($_smarty_tpl->tpl_vars['session']->value['type_user'] == 'root') {?>
                    <td><a href="representante/editar?id_repre=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_repre'];?>
" class="glyphicon glyphicon-edit"></a></td>
                    <td><a href="representante/eliminar?id_repre=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_repre'];?>
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
