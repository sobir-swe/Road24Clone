<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class License extends Model
{
    /** @use HasFactory<\Database\Factories\LicenseFactory> */
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'passport',
        'chat_id'
    ];

    public function cars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function fines(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Fine::class);
    }
}
