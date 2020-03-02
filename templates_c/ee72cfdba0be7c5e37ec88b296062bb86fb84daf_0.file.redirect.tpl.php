<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-02 02:42:12
  from 'C:\Users\MIS\Desktop\xampp\htdocs\web\templates\tpl\redirect.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5c6474cb0826_79363969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee72cfdba0be7c5e37ec88b296062bb86fb84daf' => 
    array (
      0 => 'C:\\Users\\MIS\\Desktop\\xampp\\htdocs\\web\\templates\\tpl\\redirect.tpl',
      1 => 1582161880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5c6474cb0826_79363969 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['redirect']->value) {?>
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
