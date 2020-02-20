<?php
require_once 'head.php';


/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');

/* 程式流程 */
switch ($op){
  case "login" :
    $msg = login();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", $msg, 2000, "success");
    exit;

  case "logout" :
    $msg = logout();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", '登出成功', 2000, "success");
    exit;

  case "reg" :
    $msg = reg();
    //(轉向頁面,訊息,時間)
    redirect_header("index.php", '註冊成功', 2000, "success");
    exit;

  case "contact_form" :
    $msg = contact_form();
    break;

  case "ok" :
    $msg = ok();
    break;

  case "login_form" :
    $msg = login_form();
    break;

  case "reg_form" :
    $msg = reg_form();
    break;

  default:
    $op = "op_list";
    break;
}

/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);

/*---- 程式結尾-----*/
$smarty->display('theme.tpl');

function contact_form(){

}

function ok(){

}

function login_form(){

}

function reg_form(){

}

function login(){
  global $db;

  #過濾變數
  $_POST['uname'] = db_filter($_POST['uname'], '帳號');
  $_POST['pass'] = db_filter($_POST['pass'], '密碼');

  $sql="SELECT *
        FROM `users`
        WHERE `uname` = '{$_POST['uname']}'
  ";

  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc() or redirect_header("index.php?op=login_form", '帳號錯誤', 2000, "error");

  $row['uname'] = htmlspecialchars($row['uname']); //字串過濾,去除HTML標籤
  $row['name'] = htmlspecialchars($row['name']); //字串過濾,去除HTML標籤
  $row['tel'] = htmlspecialchars($row['tel']); //字串過濾,去除HTML標籤
  $row['email'] = htmlspecialchars($row['email']); //字串過濾,去除HTML標籤
  $row['uid'] = (int)$row['uid']; //字串過濾,整數
  $row['kind'] = (int)$row['kind']; //字串過濾,整數
  $row['pass'] = htmlspecialchars($row['pass']); //字串過濾,去除HTML標籤
  $row['token'] = htmlspecialchars($row['token']); //字串過濾,去除HTML標籤

  if(password_verify($_POST['pass'], $row['pass'])){
    $_SESSION['user']['uid'] = $row['uid'];
    $_SESSION['user']['uname'] = $row['uname'];
    $_SESSION['user']['name'] = $row['name'];
    $_SESSION['user']['tel'] = $row['tel'];
    $_SESSION['user']['email'] = $row['email'];
    $_SESSION['user']['kind'] = $row['kind'];

    $_POST['remember'] = isset($_POST['remember']) ? $_POST['remember'] : "";
  
    if($_POST['remember']){
      setcookie("uname",$row['uname'], time()+ 3600 * 24 * 365); 
      setcookie("token", $row['token'], time()+ 3600 * 24 * 365); 
    }
    return "登入成功";
  }else{
    $_SESSION['user']['uid'] = "";
    $_SESSION['user']['uname'] = "";
    $_SESSION['user']['name'] = "";
    $_SESSION['user']['tel'] = "";
    $_SESSION['user']['email'] = "";
    $_SESSION['user']['kind'] = "";

    redirect_header("index.php?op=login_form", '登入失敗', 2000, "error");
  }
}

function logout(){
  $_SESSION['user']['kind'] = "";

  // $_SESSION['admin']=false;
  setcookie("uname", "", time() - 3600 * 24 * 365);
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