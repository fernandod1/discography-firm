<?php

namespace App\Services;

use App\Models\Lp;
use App\Models\Artist;
use App\Models\Author;
use App\Http\Requests\LpStoreRequest;
use App\Http\Requests\LpUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exceptions\LpStoreException;
use Exception;
use Throwable;

class LpService 
{

    /**
     * index method
     * 
     * Get form database list of LPs paginated.
     * 
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Lp::latest()->paginate(5);        
    }
    
    /**
     * create method
     * 
     * Show LP view page with artists and authors.
     * 
     * @return array
     */
    public function create(): array
    {
        return [
            'artists' => Artist::orderBy('name')->get(),
            'authors' => Author::orderBy('name')->get()
        ];
    }

    /**
     * store method
     * 
     * Store in database a LP and it's songs and authors.
     * 
     * @param LpStoreRequest|LpUpdateRequest $request
     * @return void
     */
    public function store(LpStoreRequest|LpUpdateRequest $request): void
    {
        $exception = DB::transaction(function() use ($request) {
            $lp = Lp::create($request->validated());
            $lp->addAuthorsSongs($request);
        });

        if(!is_null($exception)) 
            throw new LpStoreException('Cant not store new LP. Error in transaction process.');
    }

    /**
     * edit method
     * 
     * Display view to add new LP including artists and authors.
     * 
     * @return array
     */
    public function edit(): array
    {
        return [
            'artists' => Artist::orderBy('name')->get(),
            'authors' => Author::orderBy('name')->get()
        ];
    }

    /**
     * update method
     * 
     * Updates a LP including it's songs and authors.
     * 
     * @param \App\Http\Requests\LpUpdateRequest $request
     * @param \App\Models\Lp $lp
     * @return void
     */
    public function update(LpUpdateRequest $request, Lp $lp): void
    {
        $exception = DB::transaction(function() use ($request, $lp) {
            $lp->update($request->validated());
            $lp->updateAuthorsSongs($request);
        });

        if(!is_null($exception)) 
            throw new LpStoreException('Cant not update new LP. Error in transaction process.');
    }

}