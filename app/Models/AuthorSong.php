<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorSong extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'author_song';

    protected $fillable = [
        'author_id',
        'song_id'
    ];
}
