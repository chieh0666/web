<div class="container" style="margin: 100px auto 0px auto;">
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
				<input type="hidden" name="op" value="<{$row.op}>">
				<button type="submit" class="btn btn-primary">送出</button>
			</div>
    </form>
		<!-- 表單驗證 -->
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
		<style>
			.error{
				color: #dc3545
			}
		</style>
		<script>
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
		</script>
</div>