<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompletedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exp_earn'
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
