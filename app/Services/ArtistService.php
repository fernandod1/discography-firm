<?php

namespace App\Services;

use App\Models\Artist;

class ArtistService 
{

    /**
     * index method
     * 
     * Get form database list of artists paginated.
     * 
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Artist::latest()->paginate(5);       
    }

    /**
     * store method
     * 
     * Store in database an artist.
     * 
     * @param array $request
     * @return void
     */
    public function store(array $request): void
    {
        Artist::create($request);
    }

    /**
     * update method
     * 
     * Update in database an artist.
     * 
     * @param array $request
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function update(array $request, Artist $artist): void
    {
        $artist->update($request);
    }

    /**
     * destroy method
     * 
     * Delete from datatase an artist.
     * 
     * @param \App\Models\Artist $artist
     * @return void
     */
    public function destroy(Artist $artist): void
    {
        $artist->delete();       
    }

    /**
     * search method
     * 
     * search by name for artists in database.
     * 
     * @param string $artistName
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(string $artistName) 
    {
        return Artist::where('name', 'LIKE', "%$artistName%")
            ->orderBy('name')
            ->paginate(5);        
    }

}