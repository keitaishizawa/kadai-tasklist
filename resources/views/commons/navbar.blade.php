<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">kadai-tasklist</a>
            </div>
<!-- タスク新規作成画面以外の画面 -->
@if ($header_create_link_flg === false)
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!-- 非ログイン時 -->
                    <li>{!! link_to_route('signup.get', '会員登録') !!}</li>
                    <li><a href="#">ログイン</a></li>
                    <!-- ログイン時 -->
                    <li>{!! link_to_route('tasks.create', 'タスク新規作成画面へ') !!}</li>
                </ul>
            </div>
@endif
        </div>
    </nav>
</header>