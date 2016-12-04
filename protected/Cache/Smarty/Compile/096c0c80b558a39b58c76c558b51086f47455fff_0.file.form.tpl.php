<?php
/* Smarty version 3.1.30, created on 2016-12-02 00:11:22
  from "E:\www\CarnetizacionSO\protected\view\representante\form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5840ae1a582f02_98227511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '096c0c80b558a39b58c76c558b51086f47455fff' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\representante\\form.tpl',
      1 => 1480110970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5840ae1a582f02_98227511 (Smarty_Internal_Template $_smarty_tpl) {
?>

<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>
    <li><a href="representante/">Representantes</a></li>
    <li class="active"><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</li>
</ol>
<div class="container">
    <h1 class="header2 text-center"><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
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

            <ul>
                <li class="FormRow">   <label>C.I  </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"id_repre"),$_smarty_tpl);?>


                <li class="FormRow">
                    <label>Nombres </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"nombres_repre"),$_smarty_tpl);?>

                </li>
                <li class="FormRow">
                    <label>Apellidos </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"apellidos_repre"),$_smarty_tpl);?>
</li>
                <li class="FormRow">
                    <label>Telefono </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"telefono_repre"),$_smarty_tpl);?>
</li>

                <li class="FormRow text-center"><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->ButtonSubmit(array('class'=>"btn btn-success",'value'=>"<spam class='glyphicon glyphicon-send'></spam>Guardar"),$_smarty_tpl);?>
</li>
            </ul>

            <?php $_block_repeat1=false;
echo $_block_plugin1->Form(array('class'=>"form-control"), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>



        </div>
        <div class="col-md-1 "></div>
    </div>



</div><?php }
}
