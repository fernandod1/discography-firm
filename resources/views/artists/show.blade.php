@extends('layout')

@section('content')

<div class="card mt-5">
    <h3 class="card-header">Artist: <i>{{ $artist->name }}</i></h3>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('artists.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong> <br/>
                    {{ $artist->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong> <br/>
                    {{ $artist->description }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>LPs:</strong> <br/>
                    @forelse ($artist->lps as $lp)
                        <li><a href={{ route('lps.show', $lp->id) }}>{{$lp->name}}</a> ({{$lp->songs->count()}} songs)</li>           
                    @empty
                        <p>No LPs in database</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection