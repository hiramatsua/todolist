@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Welcome to TodoList!</h3>
          {{ __('ログイン') }}
        </div>
        <img src="todolist-top.jpg" class="card-img-top" alt="todolistイメージ画像">
        <div class="card-body">
          <p class="card-text">
            <i class="fas fa-check"></i>&nbsp;TodoListは、あなた専用のタスク管理ツールです。
            <small class="text-muted">(ご利用が初めての方は、まずはユーザー登録からどうぞ。)</small>
          </p>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('パスワードを保存') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('ログイン') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <br>
      <div class="text-center">
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('パスワードの変更はこちらから') }}
        </a>
        @endif
      </div>
    </div>
  </div>

</div>
@endsection