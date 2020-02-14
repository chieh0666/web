<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-14 07:20:36
  from 'E:\ugm\xampp\htdocs\web\templates\tpl\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e463c346f0689_30971438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00459d363ec32fd6a19991d57db51c37d2e8480c' => 
    array (
      0 => 'E:\\ugm\\xampp\\htdocs\\web\\templates\\tpl\\contact.tpl',
      1 => 1581661236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e463c346f0689_30971438 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- 表單返回頁，記得在表單加「 target='returnWin' 」 -->
<iframe name="returnWin" style="display: none;" onload="this.onload=function(){window.location='index.php?op=ok'}"></iframe>
<div class="container mt-5 ">
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
</div><?php }
}
