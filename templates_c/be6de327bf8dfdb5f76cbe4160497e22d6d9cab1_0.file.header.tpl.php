<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-01 08:44:13
  from 'C:\Users\JERRY\Desktop\xampp\htdocs\web\templates\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5b055daebe55_76562687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be6de327bf8dfdb5f76cbe4160497e22d6d9cab1' => 
    array (
      0 => 'C:\\Users\\JERRY\\Desktop\\xampp\\htdocs\\web\\templates\\tpl\\header.tpl',
      1 => 1582776784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5b055daebe55_76562687 (Smarty_Internal_Template $_smarty_tpl) {
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
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#about">關於我們</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#services">服務</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#portfolio">產品</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#contact">聯絡方式</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=contact_form">聯絡我們</a>
        </li>
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
