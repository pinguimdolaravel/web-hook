<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Url extends Model
{
    protected $guarded = [];

    public function requests(): HasMany
    {
        return $this->hasMany(WebhookRequest::class);
    }
}
