<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS = [
        1 => ['label' => '未処理', 'class' => 'mishori'],
        2 => ['label' => '処理中', 'class' => 'shorichu'],
        3 => ['label' => '確認中', 'class' => 'kakuninchu'],
        4 => ['label' => '完了'  , 'class' => 'kanryo'],
    ];

    protected $fillable = [
        'title',
        'contents',
    ];

    public function getStatusLabelAttribute() {

        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }
        
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute() {

        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }
        
        return self::STATUS[$status]['class'];
    }
}
