<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-05 08:49:36
  from 'E:\ugm\xampp\htdocs\web\templates\tpl\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3a73904b9d54_53877339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbf43f063180700235317dace057b0469fa24c90' => 
    array (
      0 => 'E:\\ugm\\xampp\\htdocs\\web\\templates\\tpl\\admin.tpl',
      1 => 1580888932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3a73904b9d54_53877339 (Smarty_Internal_Template $_smarty_tpl) {
?><h1 class="text-center mt-2">管理者後台</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
			<div class="card" style="width: 18rem;">
				<div class="bg-primary text-white card-header">
					管理員
				</div>
				<ul class="list-group list-group-flush">
					<a href="index.php">
						<li class="list-group-item">首頁</li>
					<a href="user.php?op=logout">
						<li class="list-group-item">登出</li>
					</a>
				</ul>
			</div>
		</div>    
  </div>
</div>
<?php }
}
