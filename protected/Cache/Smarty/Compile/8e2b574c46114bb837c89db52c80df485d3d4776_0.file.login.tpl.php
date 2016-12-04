<?php
/* Smarty version 3.1.30, created on 2016-11-30 04:28:56
  from "E:\www\CarnetizacionSO\protected\view\user\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583e4778e45420_37388370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e2b574c46114bb837c89db52c80df485d3d4776' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\user\\login.tpl',
      1 => 1480155910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583e4778e45420_37388370 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
    <h1 class="header2 text-center">Iniciar Session</h1>
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
                <li class="FormRow">   <label>Usuario </label><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"user"),$_smarty_tpl);?>


                <li class="FormRow">
                    <label>Contraseña </label>
                    <?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->Input(array('name'=>"pass"),$_smarty_tpl);?>

                </li>

                <li class="FormRow text-center"><?php echo $_smarty_tpl->smarty->registered_objects['form'][0]->ButtonSubmit(array('class'=>"btn btn-success",'value'=>"<spam class='glyphicon glyphicon-send'></spam>Ingresar"),$_smarty_tpl);?>
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
