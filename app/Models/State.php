<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['country_id', 'name'])]
class State extends Model
{
    use HasFactory;

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
