<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ArtistStoreRequest;
use App\Http\Requests\ArtistUpdateRequest;
use App\Http\Requests\ArtistSearchRequest;
use App\Services\ArtistService;

class ArtistController extends Controller
{
    public function __construct(
        private ArtistService $artistService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $artists = $this->artistService->index();
          
        return view('artists.index', compact('artists'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistStoreRequest $request): RedirectResponse
    {
        $this->artistService->store($request->validated());
                   
        return redirect()->route('artists.index')
                         ->with('success', 'Artist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist): View
    {
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist): View
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtistUpdateRequest $request, Artist $artist): RedirectResponse
    {
        $this->artistService->update($request->validated(), $artist);

        return redirect()->route('artists.index')
                        ->with('success', 'Artist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist): RedirectResponse
    {
        $this->artistService->destroy($artist);
           
        return redirect()->route('artists.index')
                        ->with('success', 'Artist deleted successfully');
    }

    /**
     * Search for artists by name.
     */
    public function search(ArtistSearchRequest $request): View   
    {
        $searchKey = $request->input('artist');
        $artists = $this->artistService->search($searchKey);

        return view('artists.index', compact('artists', 'searchKey'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
