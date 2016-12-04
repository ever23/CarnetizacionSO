<?php
/* Smarty version 3.1.30, created on 2016-12-01 03:12:50
  from "E:\www\CarnetizacionSO\protected\view\docente\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583f8722675e88_28631877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '324af3b492fbd10f05ee016ea328a2ca57a2cdf5' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\docente\\index.tpl',
      1 => 1480160988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f8722675e88_28631877 (Smarty_Internal_Template $_smarty_tpl) {
?>


<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li class="active">Docentes</li>
</ol>
<div class="container">
    <h1 class="header2 text-center">Docentes <small><a href="docente/insertar" class="btn btn-danger glyphicon glyphicon-plus-sign"></a></small></h1>
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

                <th></th>
                <th></th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_objects['docente'][0]) ? $_smarty_tpl->smarty->registered_objects['docente'][0] : null;
if (!is_callable(array($_block_plugin1, 'each'))) {
throw new SmartyException('block tag \'docente\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('docente', array('row'=>'row'));
$_block_repeat1=true;
echo $_block_plugin1->each(array('row'=>'row'), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id_docente'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombres_docente'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['apellidos_docente'];?>
</td>

                <td><a href="docente/info?id_docente=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_docente'];?>
" class="glyphicon glyphicon-info-sign"></a></td> 
                <td><a href="docente/editar?id_docente=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_docente'];?>
" class="glyphicon glyphicon-edit"></a></td>
                <td><a href="docente/eliminar?id_docente=<?php echo $_smarty_tpl->tpl_vars['row']->value['id_docente'];?>
" class="glyphicon glyphicon-remove"></a></td>

            </tr>
            <?php $_block_repeat1=false;
echo $_block_plugin1->each(array('row'=>'row'), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

        </tbody>
    </table>



</div><?php }
}
