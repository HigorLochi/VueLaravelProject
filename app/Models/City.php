<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\belongsTo;

#[Fillable(['country_id', 'name'])]
class City extends Model
{
    public function country(): belongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
