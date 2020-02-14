<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
 
/* 程式流程 */
switch ($op){
  
  case "reg" :
    $msg = reg();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", '註冊成功', 2000,"success");
    exit;
 
  case "login" :
    $msg = login();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", '登入成功', 2000, "success");
    exit;
  
  case "logout" :
    $msg = logout();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", '登出成功', 2000, "success");
    exit;
    
  default:
    $op = "op_list";
    op_list();
    break;
}
 
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('user.tpl');
 
/*---- 函數區-----*/

function logout(){
  $_SESSION["jerry"]=false;
  setcookie("name", "", time() - 3600 * 24 * 365);
  setcookie("token", "", time() - 3600 * 24 * 365);
}
/*=======================
註冊函式(寫入資料庫)
=======================*/
function reg(){
  global $db;

  #過濾變數
  $_POST['uname'] = db_filter($_POST['uname'], '帳號');
  $_POST['pass'] = db_filter($_POST['pass'], '密碼');
  $_POST['chk_pass'] = db_filter($_POST['chk_pass'], '確認密碼');
  $_POST['name'] = db_filter($_POST['name'], '姓名');
  $_POST['tel'] = db_filter($_POST['tel'], '電話');
  $_POST['email'] = db_filter($_POST['email'], 'email', FILTER_SANITIZE_EMAIL);

  #密碼加密處理
  if($_POST['pass'] != $_POST['chk_pass']){
    redirect_header("index.php?op=reg_form", '密碼不一致', 2000, "warning");
  }
  $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $_POST['token']  = password_hash($_POST['uname'], PASSWORD_DEFAULT);

  #寫入語法
  $sql="INSERT INTO `users` 
        (`uname`, `pass`, `name`, `tel`, `email`, `token`)  
        VALUES 
        ('{$_POST['uname']}', '{$_POST['pass']}', '{$_POST['name']}', '{$_POST['tel']}', '{$_POST['email']}', '{$_POST['token']}');";
  #寫入資料庫
  $db->query($sql) or die($db->error. $sql);
  $uid = $db->insert_id;
}

function login(){
  global $smarty;
    $name="jerry";
    $pass="0000";
    $token="xxxxxx";
   
    if($name == $_POST['name'] and $pass == $_POST['pass']){
        $_SESSION['jerry'] = true;
        $_POST["remember"] = isset($_POST["remember"]) ? $_POST["remember"] : "";
        
        if($_POST["remember"]){
          setcookie("name", $name, time() + 3600 * 24 * 365);
          setcookie("token", $token, time() + 3600 * 24 * 365);
        }
          return "登入成功";
    }else{
      redirect_header("index.php?op=login_form", '登入失敗', 2000, "error");
    }
  //print_r($_POST); //印出列表
  // var_dump($_POST);
  // die();
}

function op_list(){

}