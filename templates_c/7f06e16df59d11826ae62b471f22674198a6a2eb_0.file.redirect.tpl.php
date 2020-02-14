<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-14 03:50:41
  from 'E:\ugm\xampp\htdocs\web\templates\tpl\redirect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e460b01527300_69934730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f06e16df59d11826ae62b471f22674198a6a2eb' => 
    array (
      0 => 'E:\\ugm\\xampp\\htdocs\\web\\templates\\tpl\\redirect.tpl',
      1 => 1581648546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e460b01527300_69934730 (Smarty_Internal_Template $_smarty_tpl) {
?>
        <?php if ($_smarty_tpl->tpl_vars['redirect']->value) {?>
      <!-- sweetalert2 -->
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.css">
      <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
>
        window.onload = function(){
          Swal.fire({
          // position: 'top-end',
          icon: "<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
",
          title: "<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
",
          showConfirmButton: false,
          timer: "<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
"
        })
        }
      <?php echo '</script'; ?>
>
    <?php }
}
}
