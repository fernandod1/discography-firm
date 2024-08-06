@extends('layout')

@section('content')

<div class="card mt-5">
    <h3 class="card-header">Add New LP</h3>
    <div class="card-body">

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('lps.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('lps.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="inputArtist" class="form-label"><strong>Artist:</strong></label>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <select class="form-control @error('artist_id') is-invalid @enderror" name="artist_id">
                        <option value="" selected>-- Select artist --</option>
                        @foreach ($artists as $artist)
                            <option value="{{$artist->id}}"        
                            {{ $artist->id == old('artist_id', '') ? 'selected' : '' }}>{{$artist->name}}</option>    
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
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name" value="{{ old('name', '') }}">
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
                    placeholder="description">{{ old('description', '') }}</textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputTotalSongs" class="form-label"><strong>Number of songs:</strong></label>
                <input class="form-control" type="number" min="1" max="15" name="totalSongs" value="0" onchange="makeSongAuthorSelectDynamic(this)">
            </div>
                <div id="displaySongsAuthorsInputs"></div>            
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>
<script>
        var inputSong = `<div class="mb-3">
            <label for="inputNumSongs" class="form-label"><strong>Details about song:</strong></label>
            <input class="form-control mt-2 @error('songsAuthors.0.song') is-invalid @enderror" name="songsAuthors[0][song]" placeholder="Song 1 title" value="{{ old('songsAuthors.0.song', '') }}">
            @error('songsAuthors.0.song')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        `;

        var selectorAuthor = `
                        <div id="artists_select">
                    <div  class="form-group row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
            <select class="form-control mt-2 @error('songsAuthors.0.authors.0') is-invalid @enderror" name="songsAuthors[0][authors][]">
                <option value="" selected>-- Select author --</option>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}" 
                    {{ $author->id == old('songsAuthors.0.authors.0', '') ? 'selected' : '' }}>{{$author->name}}</option>    
                @endforeach
            </select>
            @error('songsAuthors.0.authors.0')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
                                    </div>
                        
        `;

        var inputManualAuthor = `<div class="col-xs-12 col-sm-6 col-md-4">
            <input class="form-control mt-2 @error('songsAuthors.0.authorsManual') is-invalid @enderror" name="songsAuthors[0][authorsManual]" placeholder="Author1,Author2,Author3" value="{{ old('songsAuthors.0.authorsManual', '') }}"> * Comma separated manual input
            @error('songsAuthors.0.authorsManual')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
                                    </div>
                   </div>
                   </div>
                   </div>
                   
        `;

    function makeSongAuthorSelectDynamic(input) {
        var html = '';
        const element0 = document.getElementById('artists_select');
        for(i=0;i<=input.value-1;i++) {
            html = html 
            + '<hr>' 
            + inputSong.replace("songsAuthors[0][song]", "songsAuthors[" + i + "][song]").replace("songsAuthors.0.song", "songsAuthors." + i + ".song")
            + selectorAuthor.replace("songsAuthors[0][authors][]", "songsAuthors[" + i + "][authors][]").replace("songsAuthors.0.authors.0", "songsAuthors." + i + ".authors.0")
            + inputManualAuthor.replace("songsAuthors[0][authorsManual]", "songsAuthors[" + i + "][authorsManual]").replace("songsAuthors.0.authorsManual.0", "songsAuthors." + i + ".authorsManual.0");
        }       
        const element = document.getElementById('displaySongsAuthorsInputs');
        element.innerHTML = html;
    }
</script>

@endsection