<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest {

    public function authorize() {
        
        return true;
    }

    public function rules() {

        return [
            'title' => 'required|max:100',
            'contents' => 'required|max:255',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    public function attributes() {
        
        return [
            'title' => 'タイトル名',
            'contents' => '内容',
            'due_date' => '期限日',
        ];
    }

    public function messages() {

        return [
            'due_date.after_or_equal' => ':attributeには、今日以降の日付を入力して下さい。',
        ];
    }
}