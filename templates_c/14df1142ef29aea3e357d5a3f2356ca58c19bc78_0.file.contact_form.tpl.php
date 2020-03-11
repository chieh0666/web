<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-05 16:29:27
  from 'E:\xampp\htdocs\web\templates\tpl\contact_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e60b8675d5cc1_69201255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14df1142ef29aea3e357d5a3f2356ca58c19bc78' => 
    array (
      0 => 'E:\\xampp\\htdocs\\web\\templates\\tpl\\contact_form.tpl',
      1 => 1583396958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e60b8675d5cc1_69201255 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container" style="margin: 100px auto 0px auto;">
    <h1 class="text-center">聯絡我們</h1>
    <form role="form" action="index.php" method="post" id="myForm">
			<div class="row">
				<!--姓名-->              
				<div class="col-sm-4">
					<div class="form-group">
						<label>
							<span class="title">姓名</span>
						</label>
						<input type="text" class="form-control" name="name" id="name" value="">
					</div>
				</div>          
				<!--電話-->              
				<div class="col-sm-4">
					<div class="form-group">
						<label>
							<span class="title">電話</span>
						</label>
						<input type="text" class="form-control" name="tel" id="tel" value="">
					</div>
				</div>          
				<!--email-->              
				<div class="col-sm-4">
					<div class="form-group">
						<label>
							<span class="title">email</span>
						</label>
						<input type="text" class="form-control" name="email" id="email" value="">
					</div>
			</div> 
		</div>
		<div class="row">
			<div class="col-sm-12">  
				<!-- 備註 -->
				<div class="form-group">
					<label class="control-label">聯絡事項</label>
					<textarea class="form-control" rows="4" id="content" name="content"></textarea>
				</div>
			</div>
		</div>
			<div class="text-center pb-3">
				<input type="hidden" name="op" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['op'];?>
">
				<button type="submit" class="btn btn-primary">送出</button>
			</div>
    </form>
		<!-- 表單驗證 -->
		<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>
		<style>
			.error{
				color: #dc3545
			}
		</style>
		<?php echo '<script'; ?>
>
			$(function(){
				$("#myForm").validate({
					submitHandler: function(form) {
							form.submit();
					},
					rules: {
						"name" : {
							required: true
						},
						"tel" : {
							required: true
						},
						"email" : {
							required: true
						}
					},
					messages: {
						"name" : {
							required: "必填"
						},
						"tel" : {
							required: "必填"
						},
						"email" : {
							required: "必填"
						}
					}
				});
			});
		<?php echo '</script'; ?>
>
</div><?php }
}
