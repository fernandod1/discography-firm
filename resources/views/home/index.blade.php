@extends('layout')

@section('content')

<div class="card mt-5">
    <h3 class="card-header">Lastest LPs and Artists added</h3>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('lps.create') }}"><i class="fa fa-plus"></i> New LP</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>LP Name</th>
                    <th>Artist</th>
                    <th>Songs</th>
                    <th>Authors</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($lps as $lp)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td><a href={{ route('lps.show', $lp->id) }}>{{$lp->name}}</a></td>
                        <td><a href={{ route('artists.show', $lp->artist->id) }}>{{$lp->artist->name}}</a></td>
                        <td>
                            <b>{{$lp->songs->count()}} songs</b>:
                            @forelse ($lp->songs as $song)
                                <br>{{$song->name}}
                            @empty
                                <br>
                            @endforelse
                        </td>
                        <td>
                            @forelse ($lp->songs as $song)
                                <br>
                                @forelse ($song->authors as $author)
                                    {{$author->name}}.
                                @empty
                                    Not author<br>
                                @endforelse
                            @empty                     
                            @endforelse
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $lps->links() !!}

    </div>
</div>  

@endsection