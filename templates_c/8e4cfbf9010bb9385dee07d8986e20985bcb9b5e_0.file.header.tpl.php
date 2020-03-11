<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-02 21:53:10
  from 'C:\Users\JERRY\Desktop\xampp\htdocs\web11\templates\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5d0fc66fc2c8_94826567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e4cfbf9010bb9385dee07d8986e20985bcb9b5e' => 
    array (
      0 => 'C:\\Users\\JERRY\\Desktop\\xampp\\htdocs\\web11\\templates\\tpl\\header.tpl',
      1 => 1583123398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5d0fc66fc2c8_94826567 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background: rgba(244, 98, 58, 0.9);">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php"><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainMenus']->value, 'mainMenu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainMenu']->value) {
?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo $_smarty_tpl->tpl_vars['mainMenu']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['mainMenu']->value['target'] == 1) {?>target="_blank"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mainMenu']->value['title'];?>
</a>
          </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_SESSION['user']['kind'] === 1) {?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="user.php">管理後台</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
        </li>
        <?php } elseif ($_SESSION['user']['kind'] === 0) {?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=login_form">登入</a>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav><?php }
}
