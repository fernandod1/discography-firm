@extends('layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit LP</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('lps.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('lps.update',$lp->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputArtist" class="form-label"><strong>Artist:</strong></label>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <select class="form-control @error('artist_id') is-invalid @enderror" name="artist_id">
                        <option value="" selected>-- Select artist --</option>
                        @foreach ($artists as $artist)
                            <option value="{{$artist->id}}"        
                            {{ (($artist->id == $lp->artist_id) || ($artist->id == old('artist_id', ''))) ? 'selected' : '' }}>{{$artist->name}}</option>    
                        @endforeach
                    </select>
                </div>
                @error('artist_id')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $lp->name) }}"
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputDescription" class="form-label"><strong>Description:</strong></label>
                <textarea 
                    class="form-control @error('description') is-invalid @enderror" 
                    style="height:150px" 
                    name="description" 
                    id="inputDescription" 
                    placeholder="description">{{ old('description', $lp->description) }}</textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            @php $i=0;@endphp
            @forelse ($lp->songs as $song)
                <div class="mb-3">
                <label for="inputNumSongs" class="form-label"><strong>Details about song:</strong></label>
                <input class="form-control mt-2 @error('songsAuthors.'.$i.'.song') is-invalid @enderror" name="songsAuthors[{{$i}}][song]" placeholder="Song title" value="{{ old("songsAuthors.$i.song", $song->name) }}">
                @error('songsAuthors.'.$i.'.song')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <div id="artists_select">
                    <div  class="form-group row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <select class="form-control mt-2 @error('songsAuthors.'.$i.'.authors.0') is-invalid @enderror" name="songsAuthors[{{$i}}][authors][]">
                                <option value="" selected>-- Select author --</option>
                                @foreach ($authors as $author)
                                    <option value="{{$author->id}}" 
                                    >{{$author->name}}</option>    
                                @endforeach
                            </select>
                            @error('songsAuthors.'.$i.'.authors.0')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <input class="form-control mt-2 @error('songsAuthors.'.$i.'.authorsManual') is-invalid @enderror" name="songsAuthors[{{$i}}][authorsManual]" placeholder="Author1,Author2,Author3" value="{{ old('songsAuthors.'.$i.'.authorsManual', $song->authors->implode("name", ",")) }}"> * Comma separated manual input
                            @error('songsAuthors.'.$i.'.authorsManual')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="displaySongsAuthorsInputs"></div>
                </div>
            @php $i++;@endphp
            @empty                
            @endforelse
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>
@endsection