<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * lp method
     * 
     * relations between models/tables
     *
     * @return HasMany
     */
    public function lps(): HasMany
    {
        return $this->HasMany(Lp::class);
    }
}
