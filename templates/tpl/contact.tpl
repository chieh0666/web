<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
      <thead class="thead-light text-center">
        <tr>
          <th scope="col">姓名</th>
          <th scope="col">電話</th>
          <th scope="col">EMAIL</th>
          <th scope="col">聯絡事項</th>
          <th scope="col">功能</th>
        </tr>
      </thead>
      <tbody>
        <{foreach $rows as $row}>
          <tr>
            <td class="align-middle text-center"><{$row.name}></td>
            <td class="align-middle text-center"><{$row.tel}></td>
            <td class="align-middle text-center"><{$row.email}></td>
            <td class="align-middle text-left"><{$row.content}></td>
            <td class="align-middle text-center">
              <a href="contact.php?op=op_form&sn=<{$row.sn}>"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" onclick="op_delete(<{$row.sn}>);"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <{foreachelse}>
          <tr>
            <td colspan=5>目前沒有資料</td>
          </tr>
        <{/foreach}>
      </tbody>
    </table>
    
    <script>
      function op_delete(sn){
        Swal.fire({
          title: '你確定要刪除?',
          text: "你將無法還原它!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '是的，刪除它！',
          cancelButtonText: '取消'
          }).then((result) => {
          if (result.value) {
            document.location.href="contact.php?op=op_delete&sn="+sn;
          }
        })
      }
    </script>
<{/if}>
<{if $op=="op_form"}>    
  <div class="container">
      
    <form role="form" action="contact.php" method="post" id="myForm" >
        
      <div class="row">
        <!--姓名-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label><span class="title">姓名</span><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name" value="<{$row.name}>">
          </div>
        </div>
        <!--電話-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label><span class="title">電話</span><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tel" id="tel" value="<{$row.tel}>">
          </div>
        </div>
        <!--email-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label><span class="title">email</span><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="email" id="email" value="<{$row.email}>">
          </div>
        </div>
      </div> 
        
      <div class="row">
        <div class="col-sm-12">  
          <!-- 聯絡事項 -->
          <div class="form-group">
            <label class="control-label">聯絡事項</label>
            <textarea class="form-control" rows="5" name="content" id="content" ><{$row.content}></textarea>
          </div>
        </div>
      </div>
      <div class="text-center pb-3">
        <input type="hidden" name="op" value="<{$row.op}>">
        <input type="hidden" name="sn" value="<{$row.sn}>">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
    </form>
      
  </div>
    
  <!-- 表單驗證 -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
  <!-- 調用方法 -->
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
      'name' : {
      required: true
      },
      'tel' : {
      required: true
      },
      'email' : {
      required: true
      }
    },
    messages: {
      'name' : {
      required: "必填"
      },
      'tel' : {
      required: "必填"
      },
      'email' : {
      required: "必填"
      }
    }
    });
  });
  </script>
<{/if}>