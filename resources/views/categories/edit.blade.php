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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="75%">カテゴリ名</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->title }}</td>
                                            <td>
                                                <a class="btn btn-light btn-sm" href="{{ route('categories.update',['id' => $category->id]) }}">
                                                    <i class="far fa-edit"></i>&nbsp;更新</a></td>  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection