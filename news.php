<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
#沒有權限就踢走
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 2000, "warning");

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');

/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($sn);
    redirect_header("news.php", $msg, 2000, "success");
    exit;

  case "op_insert" :
    $msg = op_insert();
    redirect_header("news.php", $msg, 2000, "success");
    exit;

  case "op_update" :
    $msg = op_insert($sn);
    redirect_header("news.php", $msg, 2000, "success");
    exit;

  case "op_form" :
    $msg = op_form($sn);
    break;
    
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

function op_delete($sn){
  global $db;
  
  #刪除舊圖
  # 1.刪除實體檔案
  # 2.刪除files資料表
  delFilesByKindColsnSort("news",$sn,1);

  #刪除消息資料表
  $sql="DELETE FROM `news`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "消息資料刪除成功";
}

/*=======================
更新消息函式(寫入資料庫)
=======================*/
function op_insert($sn=""){
  global $db;						 
 
  $_POST['sn'] = db_filter($_POST['sn'], '');//流水號
  $_POST['kind_sn'] = db_filter($_POST['kind_sn'], '');//類別
  $_POST['title'] = db_filter($_POST['title'], '標題');//標題
  $_POST['content'] = db_filter($_POST['content'], '');
  $_POST['enable'] = db_filter($_POST['enable'], '');

  $_POST['date'] = db_filter($_POST['date'], '');
  $_POST['date'] = strtotime($_POST['date']);

  $_POST['sort'] = db_filter($_POST['sort'], '');
  $_POST['counter'] = db_filter($_POST['counter'], '');

  if($sn){
    $sql = "UPDATE `news` SET
                  `kind_sn` = '{$_POST['kind_sn']}',
                  `title` = '{$_POST['title']}',
                  `content` = '{$_POST['content']}',
                  `enable` = '{$_POST['enable']}',
                  `date` = '{$_POST['date']}',
                  `sort` = '{$_POST['sort']}',
                  `counter` = '{$_POST['counter']}'
                  WHERE `sn` = '{$_POST['sn']}'
    ";
    $db->query($sql) or die($db->error() . $sql);
    $msg = "消息更新成功";
  }else{
    $sql="INSERT INTO `news` 
    (`kind_sn`, `title`, `content`, `enable`, `date`, `sort`, `counter`)
    VALUES 
    ('{$_POST['kind_sn']}', '{$_POST['title']}', '{$_POST['content']}', '{$_POST['enable']}', '{$_POST['date']}', '{$_POST['sort']}', '{$_POST['counter']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $sn = $db->insert_id;
    $msg = "消息新增成功";
  }

  if($_FILES['news']['name']){
    $kind = "news";
    
    #刪除舊圖
    # 1.刪除實體檔案
    # 2.刪除files資料表
    delFilesByKindColsnSort($kind,$sn,1);

    if ($_FILES['news']['error'] === UPLOAD_ERR_OK){

      $sub_dir = "/".$kind;
      $sort = 1;
      #過濾變數
      $_FILES['news']['name'] = db_filter($_FILES['news']['name'], '');
      $_FILES['news']['type'] = db_filter($_FILES['news']['type'], '');
      $_FILES['news']['size'] = db_filter($_FILES['news']['size'], '');
      #檢查資料目錄
      mk_dir(_WEB_PATH . "/uploads");
      mk_dir(_WEB_PATH . "/uploads" . $sub_dir);
      $path = _WEB_PATH . "/uploads" . $sub_dir . "/";
      #圖片名稱
      $rand = substr(md5(uniqid(mt_rand(), 1)), 0, 5);//取得一個5碼亂數
      
      #//取得上傳檔案的副檔名
      $ext = pathinfo($_FILES["news"]["name"], PATHINFO_EXTENSION); 
      $ext = strtolower($ext);//轉小寫
      
      //判斷檔案種類
      if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif") {
        $file_kind = "img";
      } else {
        $file_kind = "file";
      }     

      $file_name = $rand . "_" . $sn . "." . $ext; 
      #圖片目錄

      # 將檔案移至指定位置
      if(move_uploaded_file($_FILES['news']['tmp_name'], $path . $file_name)){
        $sql="INSERT INTO `files` 
              (`kind`, `col_sn`, `sort`, `file_kind`, `file_name`, `file_type`, `file_size`, `description`, `counter`, `name`, `download_name`, `sub_dir`) 
              VALUES 
              ('{$kind}', '{$sn}', '{$sort}', '{$file_kind}', '{$_FILES['news']['name']}', '{$_FILES['news']['type']}', '{$_FILES['news']['size']}', NULL, '0', '{$file_name}', '', '{$sub_dir}')
        ";
        $db->query($sql) or die($db->error() . $sql);
      }
    } else {
        die("圖片上傳失敗");
    }
  }
      return $msg;

}

/*================================
  取得新聞數量的最大值
================================*/
function getProdsMaxSort(){
  global $db;
  $sql = "SELECT count(*)+1 as count
          FROM `news`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row['count'];
}

function op_form($sn=""){
  global $smarty,$db;
  
  if($sn){
    $row = getNewsBySn($sn);
    $row['op'] = "op_update";
  }else{
    $row['op'] = "op_insert";
  }

  $row['sn'] = isset($row['sn']) ? $row['sn'] : "";  
  $row['kind_sn'] = isset($row['kind_sn']) ? $row['kind_sn'] : "1";//類別值  
  $row['kind_sn_options'] = getProdsOptions("news");

  $row['title'] = isset($row['title']) ? $row['title'] : "";
  $row['content'] = isset($row['content']) ? $row['content'] : "";
  $row['enable'] = isset($row['enable']) ? $row['enable'] : "1";

  $row['date'] = isset($row['date']) ? $row['date'] : strtotime("now");
  $row['date'] = date("Y-m-d H:i:s",$row['date']);

  $row['sort'] = isset($row['sort']) ? $row['sort'] : getProdsMaxSort();
  $row['counter'] = isset($row['counter']) ? $row['counter'] : "";

  $row['news'] = isset($row['news']) ? $row['news'] : ""; //圖片
  
  $smarty->assign("row",$row);
}

function op_list(){
  global $smarty, $db;
  
  $sql = "SELECT a.*,b.title as kinds_title
          FROM `news` as a
          LEFT JOIN `kinds` as b on a.kind_sn=b.sn
          ORDER BY a.`date` desc
  ";//die($sql);

  #---分頁套件(原始$sql 不要設 limit)
  include_once _WEB_PATH."/class/PageBar/PageBar.php";
  $pageCount = 10;
  $PageBar = getPageBar($db, $sql, $pageCount, 10);
  $sql     = $PageBar['sql'];
  $total   = $PageBar['total'];
  $bar     = ($total > $pageCount) ? $PageBar['bar'] : "";
  $smarty->assign("bar",$bar);  
  #---分頁套件(end)

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows = [];
  while($row = $result->fetch_assoc()){
    $row['sn'] = (int)$row['sn']; //類別
    $row['title'] = htmlspecialchars($row['title']); //標題
    $row['kind_sn'] = (int)$row['kind_sn'];//分類
    $row['enable'] = (int)$row['enable'];//狀態
    $row['counter'] = (int)$row['counter']; //計數
    $row['news'] = getFilesByKindColsnSort("news",$row['sn']); //圖片
    $row['kinds_title'] = htmlspecialchars($row['kinds_title']);//標題
    $rows[] = $row;
  }
  $smarty->assign("rows", $rows);
}