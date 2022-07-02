@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-9">
                <nav class="card">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>&nbsp;タスクを編集する</div>
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
                        <form action="{{ route('tasks.edit', ['id' => $task->category_id, 'task_id' => $task->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>タスクID</label>
                                <input type="text" class="form-control col-1 read-only" name="id" value="{{ old('id') ?? $task->id }}" readonly="readonly">
                            </div>
                            <div class="form-group">    
                                <label>タスク名</label>
                                <input type="text" class="form-control col-6" name="title" value="{{ old('title') ?? $task->title }}">
                            </div>
                            <div class="form-group">
                                <label>内容</label>
                                <input type="text" class="form-control" name="contents" value="{{ old('contents') ?? $task->contents }}">
                            </div>
                            <div class="form-group">
                                <label>状態</label>
                                <select name="status" class="form-select col-2">
                                    @foreach(\App\Models\Task::STATUS as $key => $val)
                                        <option value="{{ $key }}"
                                            {{ $key == old('status', $task->status) ? 'selected' : '' }}>
                                            {{ $val['label'] }}
                                        </option>
                                    @endforeach            
                                </select>
                            </div>
                            <div class="form-group">
                                <label>期限</label>
                                <input type="date" class="form-control col-2" name="due_date" value="{{ old('due_date') ?? $task->due_date }}">
                            </div>
                            
                            <input type="hidden" name="category_id" value="{{ $category_id }}">
                            
                            <div class="d-flex d-grid gap-2 d-md-flex justify-content-md-end">    
                                <button type="submit" class="btn btn-success">
                                    <i class="far fa-edit"></i>&nbsp;更新</button>
                            
                        </form>
                        <form action="{{ route('tasks.destroy', ['id' => $task->category_id, 'task_id' => $task->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                                &nbsp;
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="far fa-trash-alt"></i>&nbsp;削除</button>
                            </div>
                        </form>
                    </div>
                </nav>    
            </div>
        </div>
    </div>
@endsection