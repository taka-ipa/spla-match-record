<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model
{
    protected $fillable = ['stage_id', 'rule_id', 'weapon_id', 'result', 'comment', 'user_id'];

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
}
