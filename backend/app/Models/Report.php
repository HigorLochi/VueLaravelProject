<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable(['title', 'description', 'danger_level', 'postal_code'])]
#[Hidden(['user_id'])]
class Report extends Model
{
    protected $table = 'reports';
}
