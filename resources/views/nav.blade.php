<header>
  <nav class="my-navbar">
    @if(Auth::check())
    <a class="my-navbar-brand" href="{{ route('tasks.index', Auth::user()->id ) }}">
      <i class="fas fa-home"></i>&nbsp;TodoList</a>
    <div class="my-navbar-control">
      <div class="d-flex">
        <span class="my-navbar-item">
          <i class="fas fa-user-circle"></i>&nbsp;ようこそ、{{ Auth::user()->name }}さん&nbsp;
          <a href="#" data-bs-toggle="modal" data-bs-target="#menuModal">
            <!-- trigger modal -->
            <i class="fas fa-bars fa-lg"></i>
          </a>
        </span>
      </div>
    </div>
    @else
    <!-- <a class="my-nabvar-item" href="{{ route('login') }}">
      <i class="fas fa-sign-in-alt"></i>&nbsp;ログイン</a> -->
    <a class="my-nabvar-item" href="{{ route('register') }}">
      <i class="fas fa-user-plus"></i>&nbsp;ユーザー登録</a>
    @endif
    </div>
  </nav>
</header>

<!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModalLabel">メニュー</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <a id="logout" class="btn btn-primary" href="{{ route('logout') }}">
          ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
          @csrf
          <!-- Equivalent to... -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>