<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {
    // ログインユーザーを取得する
        $user = Auth::user();
            
    // ログインユーザーに紐づくカテゴリを１つ取得する
        $category = $user->categories()->first();
            
    // まだ１つもカテゴリを作っていなければホームページをレスポンスする
        if (is_null($category)) {
            return view('home');    
        }
            
    // カテゴリあればそのカテゴリのタスク一覧へリダイレクトする
        return redirect()->route('tasks.index', [
            'id' => $category->id,
        ]);
    }

    public function menu() {
 
        return view('menu');
    }
}