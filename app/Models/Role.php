<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    const SALES = 1;
    const BACK_OFFICE = 2;
    const ADMIN = 3;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
