<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['order', 'title'])]
class DangerLevel extends Model
{
    use HasFactory;

    public $timestamps = false;
}
