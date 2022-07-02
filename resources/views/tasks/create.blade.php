@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-12">
                <nav class="card">
                    <div class="card-header">
                        <i class="fas fa-plus"></i>&nbsp;タスクを追加する</div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $err_msg)
                                        <li>{{ $err_msg }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('tasks.create', ['category_id' => $category_id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>タスク名</label>
                                <input type="text" class="form-control col-6" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>内容</label>
                                <input type="text" class="form-control" name="contents" value="{{ old('contents') }}">
                            </div>
                            <div class="form-group">
                                <label>期限</label>
                                <input type="date" class="form-control col-2" name="due_date" value="{{ old('due_date') }}">
                            </div>
                            
                            <input type="hidden" name="category_id" value="{{ $category_id }}">
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>&nbsp;追加する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection