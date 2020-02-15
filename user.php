<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
#沒有權限就踢走
if(!$_SESSION['jerry'])redirect_header("index.php", '您沒有權限', 2000, "warning");
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
 
/* 程式流程 */
switch ($op){
    
  default:
    $op = "op_list";
    op_list();
    break;
}
 
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('admin.tpl');
 
/*---- 函數區-----*/

function op_list(){
  global $smarty, $db;

  $sql = "SELECT * FROM `users`";

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows = [];
  while($row = $result->fetch_assoc()){
    $row['uname'] = htmlspecialchars($row['uname']); //字串過濾,去除HTML標籤
    $row['name'] = htmlspecialchars($row['name']); //字串過濾,去除HTML標籤
    $row['tel'] = htmlspecialchars($row['tel']); //字串過濾,去除HTML標籤
    $row['email'] = htmlspecialchars($row['email']); //字串過濾,去除HTML標籤
    $row['uid'] = (int)$row['uid']; //字串過濾,整數
    $row['kind'] = (int)$row['kind']; //字串過濾,整數
    $rows[] = $row;
  }
  $smarty->assign("rows", $rows);
}