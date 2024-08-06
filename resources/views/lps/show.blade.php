@extends('layout')

@section('content')

<div class="card mt-5">
    <h3 class="card-header">LP: <i>{{ $lp->name }}</i>. {{$lp->artist->name}}</h3>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('lps.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Artist:</strong> <br/>
                    <a href={{ route('artists.show', $lp->artist->id) }}>{{$lp->artist->name}}</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>LP Name:</strong> <br/>
                    {{ $lp->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong> <br/>
                    {{ $lp->description }}
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Songs:</strong> ({{$lp->songs->count()}}) <br/>
                    @forelse ($lp->songs as $song)
                        <li>{{$song->name}}</li>           
                    @empty
                        <p>No songs</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection