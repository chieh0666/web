<{if $op == "op_list"}>
  <table class="table table-striped table-bordered table-hover table-sm">
    <thead class="thead-light text-center">
      <tr>
        <th scope="col" width="85px">圖片</th>
        <th scope="col">標題</th>
        <th scope="col">分類</th>
        <th scope="col">狀態</th>
        <th scope="col">人氣</th>
        <th scope="col">
          <a href="news.php?op=op_form"><i class="fas fa-plus"></i>新增</a>
        </th>
      </tr>
    </thead>
    <tbody>
      <{foreach $rows as $row}>
        <tr>
          <td class="align-middle text-center"><img src="<{$row.news}>" alt="<{$row.title}>" width="80px"></td>
          <td class="align-middle text-center"><{$row.title}></td>
          <td class="align-middle text-center"><{$row.kinds_title}></td>
          <td class="align-middle text-center"><{if $row.enable}><i class="fas fa-check"></i><{/if}></td>
          <td class="align-middle text-center"><{$row.counter}></td>
          <td class="align-middle text-center">
            <a href="news.php?op=op_form&sn=<{$row.sn}>"><i class="fas fa-edit"></i></a>
            <a href="javascript:void(0);" onclick="op_delete(<{$row.sn}>);"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
      <{foreachelse}>
        <tr>
          <td colspan="6" class="text-center">目前沒有資料</td>
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
        confirmButtonText: '確定',
        cancelButtonText: '取消'
      }).then((result) => {
      if (result.value) {
        document.location.href="news.php?op=op_delete&sn="+sn;
      }
      })
    }
  </script>
<{$bar}>
<{/if}>
<{if $op == "op_form"}>
  <div class="container" style="margin: 100px auto 0px auto;">
    
    <form action="news.php" method="post" id="myForm" class="mb-20" enctype="multipart/form-data">
    
      <div class="row">         
        <!--標題-->
        <div class="col-sm-4">
          <div class="form-group">
            <label>標題<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" id="title" value="<{$row.title}>">
          </div>
        </div>
        <!--分類-->
        <div class="col-sm-4">
          <div class="form-group">
            <label>分類</label>
            <select class="form-control" name="kind_sn" id="kind_sn">
              <{foreach $row.kind_sn_options as $option}>
                <option value="<{$option.sn}>"<{if $option.sn == $row.kind_sn}>selected<{/if}>><{$option.title}></option>
              <{/foreach}>
            </select>
          </div>
        </div>
        <!-- 商品狀態  -->
        <div class="col-sm-4">
          <div class="form-group">
            <label style="display:block;">商品狀態</label>
            <input type="radio" name="enable" id="enable_1" value="1" <{if $row.enable == '1'}>checked<{/if}>>
            <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
            <input type="radio" name="enable" id="enable_0" value="0" <{if $row.enable == '0'}>checked<{/if}>>
            <label for="enable_0" style="display:inline;">停用</label>
          </div>
        </div>
        <!--建立日期-->
        <div class="col-sm-4">
          <div class="form-group">
            <label>建立日期</label>
            <input type="text" class="form-control" name="date" id="date" value="<{$row.date}>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">
          </div>
        </div>
        <!--排序-->
        <div class="col-sm-4">
          <div class="form-group">
            <label>排序</label>
            <input type="text" class="form-control" name="sort" id="sort" value="<{$row.sort}>">
          </div>
        </div>
        <!--計數-->
        <div class="col-sm-4">
          <div class="form-group">
            <label>計數</label>
            <input type="text" class="form-control" name="counter" id="counter" value="<{$row.counter}>">
          </div>
        </div>
        <!--圖片-->
        <div class="col-sm-4">
          <div class="form-group">
            <label>圖片</label>
            <input type="file" class="form-control" name="news" id="news">
            <label class="mt-1">
              <{if $row.news}>
                <img src="<{$row.news}>" alt="<{$row.title}>" class="img-fluid">
              <{/if}>
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">  
          <!-- 內容 -->
          <div class="form-group">
            <label class="control-label">內容</label>
            <textarea class="form-control" rows="5" id="content" name="content"><{$row.content}></textarea>
          </div>
        </div>
      </div>
      
      <!-- ckeditor -->
      <script src="<{$xoAppUrl}>class/ckeditor/ckeditor.js"></script>
      <script>
          CKEDITOR.replace('content',{
              height:500,//高度
              contentsCss: ['<{$xoImgUrl}>css/creative.css'],//前台樣板css
              removeDialogTabs: 'image:Link',//取消連結 //link:target;link:advanced;image:advanced
              filebrowserBrowseUrl: '<{$xoAppUrl}>class/elfinder.php?type=image'//呼叫elfinder.php
          });
      </script>

      <div class="text-center pb-20">
        <input type="hidden" name="op" value="<{$row.op}>">
        <input type="hidden" name="sn" value="<{$row.sn}>">
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
            "title" : {
              required: true
            }
          },
          messages: {
            "title" : {
              required: "必填"
            }
          }
        });
      });
    </script>
    <script type='text/javascript' src='<{$xoAppUrl}>class/My97DatePicker/WdatePicker.js'></script>
  </div>
<{/if}>