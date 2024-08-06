<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discography firm app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <svg height="60px" width="60px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 504 504" xml:space="preserve">
            <path style="fill:#4d54a1;" d="M252,2C114,2,2,114,2,252s112,250,250,250s250-112,250-250S390,2,252,2z"/>
            <path style="fill:#E8E3E3;" d="M252,170.4c-45.2,0-81.6,36.8-81.6,81.6s36.8,81.6,81.6,81.6s81.6-36.8,81.6-81.6
                S297.2,170.4,252,170.4z M252,266c-7.6,0-14-6.4-14-14s6.4-14,14-14s14,6.4,14,14S259.6,266,252,266z"/>
            <circle style="fill:#F4EFEF;" cx="252" cy="252" r="10"/>
            <path d="M252,504C110.8,504,0,393.2,0,252S110.8,0,252,0s252,110.8,252,252S393.2,504,252,504z M252,8C115.2,8,8,115.2,8,252
                s107.2,244,244,244s244-107.2,244-244S388.8,8,252,8z"/>
            <path d="M252,339.6c-48.4,0-87.6-39.2-87.6-87.6s39.2-87.6,87.6-87.6c48.4,0,87.6,39.2,87.6,87.6S300.4,339.6,252,339.6z M252,172.4
                c-44,0-79.6,35.6-79.6,79.6s35.6,79.6,79.6,79.6s79.6-35.6,79.6-79.6S296,172.4,252,172.4z"/>
            <path d="M136.4,256c-2.4,0-4-1.6-4-4c0-66,53.6-119.6,119.6-119.6c2.4,0,4,1.6,4,4s-1.6,4-4,4c-61.6,0-111.6,50-111.6,111.6
                C140.4,254.4,138.4,256,136.4,256z"/>
            <path d="M252,371.6c-2.4,0-4-1.6-4-4s1.6-4,4-4c61.6,0,111.6-50,111.6-111.6c0-2.4,1.6-4,4-4s4,1.6,4,4
                C371.6,318,318,371.6,252,371.6z"/>
            <path d="M104,256c-2.4,0-4-1.6-4-4c0-84,68.4-152,152-152c2.4,0,4,1.6,4,4s-1.6,4-4,4c-79.6,0-144,64.8-144,144
                C108,254.4,106,256,104,256z"/>
            <path d="M252,404c-2.4,0-4-1.6-4-4s1.6-4,4-4c79.6,0,144-64.8,144-144c0-2.4,1.6-4,4-4s4,1.6,4,4C404,336,336,404,252,404z"/>
            <path d="M72,256c-2.4,0-4-1.6-4-4c0-101.2,82.4-184,184-184c2.4,0,4,1.6,4,4s-1.6,4-4,4c-96.8,0-176,78.8-176,176
                C76,254.4,74.4,256,72,256z"/>
            <path d="M252,436c-2.4,0-4-1.6-4-4s1.6-4,4-4c96.8,0,176-78.8,176-176c0-2.4,1.6-4,4-4s4,1.6,4,4C436,353.2,353.2,436,252,436z"/>
            <path d="M40.4,256c-2.4,0-4-1.6-4-4c0-118.8,96.8-215.6,215.6-215.6c2.4,0,4,1.6,4,4s-1.6,4-4,4C137.6,44.4,44.4,137.6,44.4,252
                C44.4,254.4,42.8,256,40.4,256z"/>
            <path d="M252,467.6c-2.4,0-4-1.6-4-4s1.6-4,4-4c114.4,0,207.6-93.2,207.6-207.6c0-2.4,1.6-4,4-4s4,1.6,4,4
                C467.6,370.8,370.8,467.6,252,467.6z"/>
            <path d="M252,268c-8.8,0-16-7.2-16-16s7.2-16,16-16s16,7.2,16,16S260.8,268,252,268z M252,244c-4.4,0-8,3.6-8,8s3.6,8,8,8s8-3.6,8-8
                S256.4,244,252,244z"/>
            </svg>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('artists.index') }}">Artists</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('lps.index') }}">LPs</a>
            </li>
        </ul>
        </div>
        <form class="d-flex" role="search" method=GET action="{{ route('artists.search') }}">
            <input class="form-control me-2 @error('artist') is-invalid @enderror" name="artist" type="search" placeholder="Artist name" value="{{ old("artist") }}" aria-label="Search">
            @error('artist')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
    </nav>

<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>