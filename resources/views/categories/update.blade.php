@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-9">
                <nav class="card">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>&nbsp;カテゴリ名を編集する</div>
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
                        <div class="card-body">
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>カテゴリID</label>
                                    <input type="text" class="form-control col-1 read-only" name="id" value="{{ old('id') ?? $category->id }}" readonly="readonly">
                                </div>
                                <div class="form-group">    
                                    <label>カテゴリ名</label>
                                    <input type="text" class="form-control col-6" name="title" value="{{ old('title') ?? $category->title }}">
                                </div>
                            
                                <button type="submit" class="btn btn-success">
                                    <i class="far fa-edit"></i>&nbsp;更新</button>
                            </form>
                        </div>    
                    </div>
                </nav>    
            </div>
        </div>
    </div>                        
@endsection