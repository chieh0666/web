<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-26 20:42:32
  from 'E:\ugm\xampp\htdocs\web\templates\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5667b837ea86_75682054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ac5c4c927a6ffceb426a9869717547b63e88d5e' => 
    array (
      0 => 'E:\\ugm\\xampp\\htdocs\\web\\templates\\tpl\\header.tpl',
      1 => 1582206024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5667b837ea86_75682054 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background: rgba(244, 98, 58, 0.9);">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php">Start Bootstrap</a>
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
