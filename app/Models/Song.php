<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'lp_id',
        'name'
    ];

    /**
     * lp method
     * 
     * relations between models/tables
     *
     * @return BelongsTo
     */
    public function lp(): BelongsTo
    {
        return $this->belongsTo(Lp::class);
    }

    /**
     * author method
     * 
     * relations between models/tables
     *
     * @return belongsToMany
     */
    public function authors(): belongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
}