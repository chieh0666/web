<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-05 17:33:05
  from 'E:\xampp\htdocs\web\templates\tpl\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e60c751641874_67414445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21203f604cbfecff648afbeb39d384f9a5e3075b' => 
    array (
      0 => 'E:\\xampp\\htdocs\\web\\templates\\tpl\\contact.tpl',
      1 => 1583400680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e60c751641874_67414445 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['op']->value == "op_list") {?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
          <tr>
            <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
            <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
</td>
            <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
            <td class="align-middle text-left"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</td>
            <td class="align-middle text-center">
              <a href="contact.php?op=op_form&sn=<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
"><i class="fas fa-edit"></i></a>
              <a href="javascript:void(0)" onclick="op_delete(<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
);"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php
}
} else {
?>
          <tr>
            <td colspan=5>目前沒有資料</td>
          </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
    
    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
<?php }
if ($_smarty_tpl->tpl_vars['op']->value == "op_form") {?>    
  <div class="container">
      
    <form role="form" action="contact.php" method="post" id="myForm" >
        
      <div class="row">
        <!--姓名-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label><span class="title">姓名</span><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
">
          </div>
        </div>
        <!--電話-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label><span class="title">電話</span><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
">
          </div>
        </div>
        <!--email-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label><span class="title">email</span><span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
">
          </div>
        </div>
      </div> 
        
      <div class="row">
        <div class="col-sm-12">  
          <!-- 聯絡事項 -->
          <div class="form-group">
            <label class="control-label">聯絡事項</label>
            <textarea class="form-control" rows="5" name="content" id="content" ><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
          </div>
        </div>
      </div>
      <div class="text-center pb-3">
        <input type="hidden" name="op" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['op'];?>
">
        <input type="hidden" name="sn" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
    </form>
      
  </div>
    
  <!-- 表單驗證 -->
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>
  <!-- 調用方法 -->
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
  <?php echo '</script'; ?>
>
<?php }
}
}
