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

    public function danger_level(): belongsTo
    {
        return $this->belongsTo(DangerLevel::class);
    }

    public function city(): belongsTo
    {
        return $this->belongsTo(City::class);
    }
}
