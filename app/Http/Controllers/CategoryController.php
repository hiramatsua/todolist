<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCategory;

class CategoryController extends Controller
{
    function showCreateForm() {

        return view('categories/create');
    }

    public function create(CreateCategory $request) {

        // Categoryモデルのインスタンスを作成する
        $category = new Category();
        // title 入力値を代入する
        $category->title = $request->title;
        // ユーザに紐付けて保存する
        Auth::user()->categories()->save($category);
        $category->save();
        // リダイレクト先の設定 カテゴリID引き渡し
        return redirect()->route('tasks.index', [
            'id' => $category->id,
        ])->with('message', 'カテゴリ追加しました。');
    }

    // get /categories/edit
    public function showEditForm() {

        $categories = Auth::user()->categories()->get();
        
        return view('categories.edit', [
            'categories' => $categories,
        ]);
    }

    // get /categories/{id}/update
    public function showUpdateForm(int $id) {

        $category = Category::find($id);
        
        return view('categories.update', [
            'category' => $category,
        ]);
    }

    // post /categories/{id}/update
    public function update(CreateCategory $request) {

        $category_id = $request->id;

        $category = Category::find($category_id);
        // 編集対象のカテゴリデータに入力値を詰めてsave
        $category->title = $request->title;
        $category->save();
    
        // メイン画面へリダイレクト
        return redirect()->route('tasks.index', [
            'id' => $category_id,
        ])->with('message_category', 'カテゴリ名を更新しました。');
    }
}
