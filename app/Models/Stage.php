<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    protected $fillable = ['name']; // 必要に応じて他の属性も追加

    /**
     * このステージで行われた試合結果を取得する。
     */
    public function matchResults(): HasMany
    {
        return $this->hasMany(MatchResult::class);
    }
}