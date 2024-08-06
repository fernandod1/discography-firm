<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Requests\LpStoreRequest;
use App\Http\Requests\LpUpdateRequest;

class Lp extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'name',
        'description'
    ];

    /**
     * song method
     * 
     * relations between models/tables
     *
     * @return HasMany
     */
    public function songs(): HasMany
    {
        return $this->HasMany(Song::class);
    }

    /**
     * artist method
     * 
     * relations between models/tables
     *
     * @return BelongsTo
     */
    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * addAuthorsSongs method
     * 
     * Persist in database songs and authors related to LP
     * 
     * @param \App\Http\Requests\LpStoreRequest|\App\Http\Requests\LpUpdateRequest $request
     * @return void
     */
    public function addAuthorsSongs(LpStoreRequest|LpUpdateRequest $request): void
    {
        $dataAuthorSong = [];
        $i=0;
        foreach ($request->songsAuthors as $songAuthors) {
            $songId = Song::Create(['lp_id' => $this->getAttribute('id'), 'name' => $songAuthors["song"]])->id;
            // Process form select authors option
            if($songAuthors["authors"][0]){
                $dataAuthorSong[$i] = ["author_id"=> $songAuthors["authors"][0], "song_id"=> $songId]; $i++;
            }        
            // Process form manual authors entries option
            $authorsManualArray = explode(',', $songAuthors["authorsManual"]);
            foreach ($authorsManualArray as $author) {
                if($author){
                    $authorId = Author::firstOrCreate(['name' => $author])->id;
                    $dataAuthorSong[$i] = ["author_id"=> $authorId, "song_id"=> $songId]; $i++;
                }
            }            
        }
        // Persist data to model
        if($dataAuthorSong) AuthorSong::insert($dataAuthorSong);
    }

    /**
     * updateAuthorsSongs
     * 
     * Update in database songs and authors related to LP
     * 
     * @param \App\Http\Requests\LpUpdateRequest $request
     * @return void
     */
    public function updateAuthorsSongs(LpUpdateRequest $request): void
    {
        Song::where('lp_id', $this->getAttribute('id'))->delete();
        $this->addAuthorsSongs($request);
    }

}
