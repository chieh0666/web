<div class="container" style="margin-top: 110px;"></div>
  <div class="row">
    <div class="col-sm-9 ml-5">
      <h1 class="my-4 mb-5">derjian消息</h1>
      <ul class="list-unstyled">
        <{foreach $rows as $row}>
          <a href="#">
            <li class="media my-4 w-50">
              <img src="<{$row.news}>" class="mr-3" alt="<{$row.title}>" width="200px">
              <div class="media-body" style="overflow: hidden;">
                <h5 class="mt-0 mb-1"><{$row.title}></h5>
                <{$row.content}>
              </div>
            </li>
          </a>
        <{/foreach}>
      </ul>
    </div>
  </div>
</div>