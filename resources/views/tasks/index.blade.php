@extends('layouts.app')
@section('content')
<!-- <h1 class="center">TodoList</h1> -->

<div class="container">
  <div class="row">
    <div class="col col-md-4">
      <div class="card">
        <div class="card-header">
          &nbsp;{{ Auth::user()->name }}さんのタスク状況</div>
        <div class="card-body">
          <div class="center">今日は、{{ $date }} です。</div>
          <p class="center fonts18">タスク数：{{ $tasks_cnt }}</p>
          <table width="100%" class="table-borderless">
            <tr>
              <td class="center">未処理</td>
              <td class="center">処理中</td>
              <td class="center">確認中</td>
              <td class="center">完了</td>
            </tr>
            <tr>
              <td class="center oval1">{{ $task_status_1 }}</td>
              <td class="center oval2">{{ $task_status_2 }}</td>
              <td class="center oval3">{{ $task_status_3 }}</td>
              <td class="center oval4">{{ $task_status_4 }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- カテゴリ一覧 -->
    <div class="col col-md-8">
      <div class="card">
        <div class="card-header pr-2">
          <i class="fas fa-list"></i>&nbsp;カテゴリ&nbsp;
          <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-sm">
            <i class="fas fa-plus"></i>&nbsp;追加</a>
          <a href="{{ route('categories.edit') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-edit"></i>&nbsp;編集</a>
        </div>
        <div class="card-body">
          <!-- <a href="{{ route('categories.create') }}" class="btn btn-default btn-block">
                        カテゴリを追加する</a> -->
          @if (session('message_category'))
          <div class="alert alert-success">
            {{ session('message_category') }}
          </div>
          @endif
          <div class="list-group">
            @foreach($categories as $category)
            <a href="{{ route('tasks.index', ['id' => $category->id]) }}"
              class="list-group-item {{ $current_category_id === $category->id ? 'active' : '' }}">
              <!-- 選択されたカテゴリに色を付ける -->
              {{ $category->title }}
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="col col-md-12">
      <!-- ここに検索 -->
      <form action="" method="get">
        @csrf
        <div class="form-group">
          <label><i class="fas fa-search"></i>&nbsp;タスク検索</label>
          <div class="d-flex">
            <input type="text" name="search" class="form-control col-6" placeholder="タスク名で検索"
              value="{{ old('search') }}">
            &nbsp;
            <button type="submit" class="btn btn-outline-secondary">
              <i class="fas fa-search"></i>&nbsp;検索</button>
          </div>
        </div>
      </form>
      <!-- タスク一覧 -->
      <div class="card">
        <div class="card-header pr-2">
          <i class="fas fa-tasks"></i>&nbsp;タスク一覧&nbsp;
          <a href="{{ route('tasks.create', ['category_id' => $current_category_id]) }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i>追加</a>
        </div>
        <div class="card-body">
          <!-- <div class="right">
                        <a href="{{ route('tasks.create', ['category_id' => $current_category_id]) }}" class="btn btn-default btn-block">
                            タスクを追加する</a></div> -->
          <!-- バリデーション表示 -->
          @if (session('message_task'))
          <div class="alert alert-success">
            {{ session('message_task') }}
          </div>
          @endif
          @if (session('task_destroy'))
          <div class="alert alert-danger">
            {{ session('task_destroy') }}
          </div>
          @endif
          <!-- ここまで -->
          <table class="table">
            <thead>
              <tr>
                <th width="20%">タスク名</th>
                <th width="30%">内容</th>
                <th width="10%" class="center">状態</th>
                <th width="10%">期限</th>
                <th>更新日時</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($tasks as $task)
              <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->contents }}</td>
                <td class="center">
                  <span class="{{ $task->status_class }}"></span>
                </td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->updated_at }}</td>
                <td>
                  <a class="btn btn-outline-secondary btn-sm"
                    href="{{ route('tasks.edit',['id' => $task->category_id, 'task_id' => $task->id]) }}">
                    <i class="far fa-edit"></i>&nbsp;更新</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-1">
        {!! $tasks->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection