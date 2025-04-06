<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Weapon extends Model
{
    protected $fillable = ['name']; // 必要に応じて他の属性も追加

    /**
     * この武器が使用された試合結果を取得する。
     */
    public function matchResults(): HasMany
    {
        return $this->hasMany(MatchResult::class);
    }
}
