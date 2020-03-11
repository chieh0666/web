<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-06 13:01:34
  from 'E:\xampp\htdocs\web\templates\tpl\news_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e61d92ec9bf63_40193310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f5bfdce559d3d6658a41aa4cefde24ab5568468' => 
    array (
      0 => 'E:\\xampp\\htdocs\\web\\templates\\tpl\\news_list.tpl',
      1 => 1583470890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e61d92ec9bf63_40193310 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container" style="margin-top: 110px;"></div>
  <div class="row">
    <div class="col-sm-9 ml-5">
      <h1 class="my-4 mb-5">derjian消息</h1>
      <ul class="list-unstyled">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
          <a href="#">
            <li class="media my-4 w-50">
              <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['news'];?>
" class="mr-3" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" width="200px">
              <div class="media-body" style="overflow: hidden;">
                <h5 class="mt-0 mb-1"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</h5>
                <?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>

              </div>
            </li>
          </a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    </div>
  </div>
</div><?php }
}
