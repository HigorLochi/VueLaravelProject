<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['user_id', 'danger_level_id', 'city_id', 'title', 'description'])]
class Report extends Model
{
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dangerlevel(): HasOne
    {
        return $this->hasOne(DangerLevel::class);
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class);
    }
}
