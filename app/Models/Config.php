<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Config extends Model
{

    protected $fillable = ['sale_target'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
