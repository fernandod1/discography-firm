<?php

namespace App\Http\Controllers;

use App\Models\Lp;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\LpStoreRequest;
use App\Http\Requests\LpUpdateRequest;
use Illuminate\Support\Facades\Route;
use App\Services\LpService;

class LpController extends Controller
{
    public function __construct(
        private LpService $lpService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $lps = $this->lpService->index();

        $customView = (Route::currentRouteName() == "index") ? 'home.index' : 'lps.index';
        return view($customView, compact('lps'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $artistsAuthors = $this->lpService->create();

        return view('lps.create',
            ['artists' => $artistsAuthors['artists'],
                'authors' => $artistsAuthors['authors']]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LpStoreRequest $request): RedirectResponse
    {
        $this->lpService->store($request);
           
        return redirect()->route('lps.index')
                         ->with('success', 'LP created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lp $lp): View
    {
        return view('lps.show', compact('lp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lp $lp): View
    {
        $artistsAuthors = $this->lpService->edit();

        return view('lps.edit',
            ['lp' => $lp,
                'artists' => $artistsAuthors['artists'], 
                'authors' => $artistsAuthors['authors']]);      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LpUpdateRequest $request, Lp $lp): RedirectResponse
    {
        $this->lpService->update($request, $lp);
          
        return redirect()->route('lps.index')
                        ->with('success', 'LP updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lp $lp): RedirectResponse
    {
        $lp->delete();
           
        return redirect()->route('lps.index')
                        ->with('success', 'LP deleted successfully');
    }

}
