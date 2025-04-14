<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchResult extends Model
{
    protected $fillable = ['stage_id', 'rule_id', 'weapon_id', 'result', 'comment','replay_code', 'user_id'];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->with('user', 'replies'); // 親コメントのみ取得、ユーザーと返信も eager load
    }
}
