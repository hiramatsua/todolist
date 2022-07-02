@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-12">
            <h2 class="card pb-2">
                Welcome to TodoList!</h2>
            <nav class="card">
                <div class="card-header center">
                    「カテゴリ」を作成してください。</div>
                <hr>
                <div class="card-body">
                    <div class="center">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            「カテゴリ」作成ページへ</a></div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
