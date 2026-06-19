<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['state_id', 'name'])]
class City extends Model
{
    use HasFactory;

    public function country(): belongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
