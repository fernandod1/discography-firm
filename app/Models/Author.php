<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    /**
     * songs method
     * 
     * relations between models/tables
     *
     * @return HasMany
     */
    public function songs(): HasMany
    {
        return $this->HasMany(Song::class);
    }
}
