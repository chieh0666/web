<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<{$xoImgUrl}>bootstrap/bootstrap.min.css" />
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<{$xoImgUrl}>bootstrap/jquery-3.4.1.min.js"></script>
    <script src="<{$xoImgUrl}>bootstrap/popper.min.js"></script>
    <script src="<{$xoImgUrl}>bootstrap/bootstrap.min.js"></script>
    <title>會員管理</title>
    <!-- Font Awesome Icons -->
    <link href="<{$xoImgUrl}>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <{* 轉向樣板 *}>
    <{include file="tpl/redirect.tpl"}>

    <h1 class="text-center mt-2">管理者後台</h1>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <{if $WEB.file_name == "user.php"}>
            <{include file="tpl/user.tpl"}>
          <{/if}>
        </div>
        <div class="col-sm-3">
          <div class="card" style="width: 18rem;">
            <div class="bg-primary text-white card-header">
              管理員
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href="index.php" class="btn-block">首頁</a>
              </li>
              <li class="list-group-item">
                <a href="http://localhost/adminer/adminer.php" class="btn-block" target="_black">資料庫管理</a>
              </li>
              <li class="list-group-item">
                <a href="index.php?op=logout" class="btn-block">登出</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>