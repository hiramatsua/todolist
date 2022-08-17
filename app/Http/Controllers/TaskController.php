<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    public function index(Request $request, int $id) {

        //  ユーザーのカテゴリを取得する
        $categories = Auth::user()->categories()->get();

        // 検索
        if ($request->filled('search')) {
            $search = $request->input('search');
        // titleに合致するタスクを取得
            $tasks = Task::where('title', 'like', '%' . $search . '%')
                ->where('category_id', $id)
                ->orderBy('due_date')
                ->paginate(5);
        } else {
        // 選択されたカテゴリに紐つくタスクとその件数を取得する
            $tasks = Task::where('category_id', $id)
                ->orderBy('due_date')
                ->paginate(5);
        }
        //dd($tasks);
        $tasks_cnt = Task::where('category_id', $id)->count();
        // 状況ごとのタスク件数を取得する
        $task_status_1 = Task::where('status', 1)->where('category_id', $id)->count();
        $task_status_2 = Task::where('status', 2)->where('category_id', $id)->count();
        $task_status_3 = Task::where('status', 3)->where('category_id', $id)->count();
        $task_status_4 = Task::where('status', 4)->where('category_id', $id)->count();

        return view('tasks.index', [
            'categories' => $categories,
            'current_category_id' => $id,
            'tasks' => $tasks,
            'date' => date('Y/m/d'),
            'tasks_cnt' => $tasks_cnt,
            'task_status_1' => $task_status_1,
            'task_status_2' => $task_status_2,
            'task_status_3' => $task_status_3,
            'task_status_4' => $task_status_4,
        ]);
    }

    public function showCreateForm(int $category_id) {

        return view('tasks.create', [
            'category_id' => $category_id,
        ]);
    }

    public function create(CreateTask $request, Category $category) {

        // dd($request);
        $category_id = $request->category_id;
        // Taskモデルのインスタンスを作成する
        $task = new Task();
        // // 入力値を代入する
        $task->title = $request->title;
        $task->contents = $request->contents;
        $task->due_date = $request->due_date;
        $task->category_id = $category_id;

        // カテゴリに紐付けて保存する
        $task->save();
        // リダイレクト先の設定 カテゴリID引き渡し
        return redirect()->route('tasks.index', [
            'id' => $category_id,
        ])->with('message_task', 'タスクを追加しました。');
    }

    // get /categories/{id}/tasks/{task_id}/edit
    public function showEditForm(int $id, int $task_id) {

        $task = Task::find($task_id);

        return view('tasks.edit', [
            'category_id' => $id,
            'task' => $task,
        ]);
    }

    // post /categories/{id}/tasks/{task_id}/edit
    public function edit(Category $category, Task $task, EditTask $request) {

        $this->checkRelation($category, $task);

        $category_id = $request->category_id;
        // 編集対象のタスクデータに入力値を詰めてsave
        $task = Task::find($request->id);
        $task->title = $request->title;
        $task->contents = $request->contents;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->category_id = $category_id;
        $task->save();

        // 編集対象のタスクが属するタスク一覧画面へリダイレクト
        return redirect()->route('tasks.index', [
            'id' => $category_id,
        ])->with('message_task', 'タスクを更新しました。');
    }

    private function checkRelation(Category $category, Task $task) {

        if ($category->id !== $task->category_id) {
            abort(404);
        }
    }

    public function destroy(int $id, int $task_id) {

        $task = Task::find($task_id);
        $task->delete();

        return redirect()->route('tasks.index', [
            'id' => $id,
        ])->with('task_destroy', 'タスクを削除しました。');
    }
}