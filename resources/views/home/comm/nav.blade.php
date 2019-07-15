<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand page-scroll" href="#page-top">iBook</a></div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#features" class="page-scroll">功能</a></li>
                <li><a href="#services" class="page-scroll">热门书籍</a></li>
                <li><a href="#about" class="page-scroll">关于我们</a></li>
                <li><a href="#portfolio" class="page-scroll">作品展示</a></li>
                <li><a href="#testimonials" class="page-scroll">经典语录</a></li>
                <li><a href="#team" class="page-scroll">团队</a></li>
                <li><a href="#contact" class="page-scroll">联系我们</a></li>
                @if( session('username') )
                    <li class="last"><a href="{{ route('logout') }}">注销</a></li>
                    <li><a href="{{ route('write') }}" class="page-scroll"><i class="icon-pencil"></i></a></li>
                    <li>
                        <a href="{{ route('user',['username'=>session('username')]) }}">
                            <div class="author-image">
                                <span class="comment-avatar">
                                    <img src="{{ URL::asset($user->icon) }}" alt="{{ $user->username }}"
                                         class='avatar avatar-60 photo avatar-default img-circle' height='40'
                                         width='40'/>
                                     <a class="badge" href="{{  url('notifications') }}">
                                    {{ session('reply') }}
                                </a>
                                </span>
                            </div>
                        </a>

                    </li>

                @else
                    <li><a href="{{ route('login') }}">登录</a></li>
                @endif

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>