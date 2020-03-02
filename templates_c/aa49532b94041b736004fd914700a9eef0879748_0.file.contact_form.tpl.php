<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-02 05:24:47
  from 'C:\Users\MIS\Desktop\xampp\htdocs\web\templates\tpl\contact_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5c8a8fc9f211_46903103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa49532b94041b736004fd914700a9eef0879748' => 
    array (
      0 => 'C:\\Users\\MIS\\Desktop\\xampp\\htdocs\\web\\templates\\tpl\\contact_form.tpl',
      1 => 1581693040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5c8a8fc9f211_46903103 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 表單返回頁，記得在表單加「 target='returnWin' 」 -->
<iframe name="returnWin" style="display: none;" onload="this.onload=function(){window.location='index.php?op=ok'}"></iframe>
<div class="container" style="margin: 100px auto 0px auto;">
    <h1 class="text-center">聯絡我們</h1>
    <form role="form" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLScUepSPrqEnh9giCYvklI77zvs-6e7VRejCDE9LGYsklyJxHw/formResponse" method="post" id="myForm" target="returnWin">
			<div class="row">
				<!--姓名-->              
				<div class="col-sm-4">
					<div class="form-group">
						<label>
							<span class="title">姓名</span>
						</label>
						<input type="text" class="form-control" name="entry.1689282052" id="name" value="">
					</div>
				</div>          
				<!--電話-->              
				<div class="col-sm-4">
					<div class="form-group">
						<label>
							<span class="title">電話</span>
						</label>
						<input type="text" class="form-control" name="entry.238838802" id="tel" value="">
					</div>
				</div>          
				<!--email-->              
				<div class="col-sm-4">
					<div class="form-group">
						<label>
							<span class="title">email</span>
						</label>
						<input type="text" class="form-control" name="entry.263970123" id="email" value="">
					</div>
			</div> 
		</div>
		<div class="row">
			<div class="col-sm-12">  
				<!-- 備註 -->
				<div class="form-group">
					<label class="control-label">聯絡事項</label>
					<textarea class="form-control" rows="4" id="contact" name="entry.1638206565"></textarea>
				</div>
			</div>
		</div>
			<div class="text-center pb-3">
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
						"entry.1689282052" : {
							required: true
						},
						"entry.238838802" : {
							required: true
						},
						"entry.263970123" : {
							required: true
						}
					},
					messages: {
						"entry.1689282052" : {
							required: "必填"
						},
						"entry.238838802" : {
							required: "必填"
						},
						"entry.263970123" : {
							required: "必填"
						}
					}
				});
			});
		<?php echo '</script'; ?>
>
</div><?php }
}
