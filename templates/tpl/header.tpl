<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background: rgba(244, 98, 58, 0.9);">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#about">關於我們</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#services">服務</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#portfolio">產品</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php#contact">聯絡方式</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=contact_form">聯絡我們</a>
        </li>
        <{if $smarty.session.user.kind === 1}>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="user.php">管理後台</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
        </li>
        <{else if $smarty.session.user.kind === 0}>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
        </li>
        <{else}>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?op=login_form">登入</a>
        </li>
        <{/if}>
      </ul>
    </div>
  </div>
</nav>