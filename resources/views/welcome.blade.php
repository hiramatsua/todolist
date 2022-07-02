@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-8">
                <div class="card mb-3">
                    <img src="todolist-top.jpg" class="card-img-top" alt="todolistイメージ画像">
                    <div class="card-body">
                        <h3 class="card-title">Welcome to TodoList!</h3>
                        <br>
                        <p class="card-text">
                            <i class="fas fa-check"></i>&nbsp;TodoListは、あなた専用のタスク管理ツールです。</p>
                        <p class="card-text">
                            <small class="text-muted">ご利用が初めての方は、まずはユーザー登録からどうぞ。</small>
                        </p>
                    </div>
                </div>
                <div class="center">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>&nbsp;ログイン</a>
                    <span class="pr-2">
                        <a href="{{ route('register') }}" class="btn btn-success">
                            <i class="fas fa-user-plus"></i>&nbsp;ユーザー登録</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
