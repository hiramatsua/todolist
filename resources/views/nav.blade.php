<header>
    <nav class="my-navbar">
        <a class="my-navbar-brand" href="/todolist/home">
            <i class="fas fa-home"></i>&nbsp;TodoList</a>
        <div class="my-navbar-control">
            @if(Auth::check())
                <div class="d-flex">
                    <span class="my-navbar-item">
                        <i class="fas fa-user-circle"></i>&nbsp;ようこそ、{{ Auth::user()->name }}さん&nbsp;
                        <a href="{{ route('menu') }}"><i class="fas fa-bars fa-lg"></i></a>
                    </span>
                <!-- <a id="logout" class="my-navbar-item" href="/todolist"> -->
                    <!-- ログアウト</a> -->
                <!-- <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;"> -->
                    <!-- @csrf -->
                <!-- </form> -->
                <!-- <div class="openbtn4">-->
                    <!-- <span></span><span></span><span></span></div> -->
                   
                </div>
            @else
                <a class="my-nabvar-item" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>&nbsp;ログイン</a>
                <a class="my-nabvar-item" href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i>&nbsp;ユーザー登録</a>
            @endif
        </div>
    </nav>    
</header>