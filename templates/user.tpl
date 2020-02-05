<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<{$xoImgUrl}>bootstrap/bootstrap.min.css" />
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<{$xoImgUrl}>bootstrap/jquery-3.4.1.min.js"></script>
    <script src="<{$xoImgUrl}>bootstrap/popper.min.js"></script>
    <script src="<{$xoImgUrl}>bootstrap/bootstrap.min.js"></script>
    <title>會員管理</title>
  </head>
  <body>
		<{if $smarty.session.jerry}>
			<{include file="tpl/admin.tpl"}>
		<{else}>
			<{include file="tpl/login.tpl"}>
    <{/if}>
  </body>
</html>
