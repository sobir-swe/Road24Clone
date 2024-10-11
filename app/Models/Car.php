<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    public function owner(): HasOne
    {
        return $this->hasOne(License::class, 'owner_id');
    }
}
