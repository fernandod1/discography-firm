@extends('layout')

@section('content')

<div class="card mt-5">
    <h3 class="card-header">Artists listing @if(isset($searchKey)) <i>{{$searchKey}}</i> @endif</h3>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('artists.create') }}"><i class="fa fa-plus"></i> New artist</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($artists as $artist)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td><a href={{ route('artists.show', $artist->id) }}>{{ $artist->name }}</a></td>
                        <td>{{ $artist->description }}</td>
                        <td>
                            <form action="{{ route('artists.destroy',$artist->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('artists.show',$artist->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('artists.edit',$artist->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $artists->links() !!}

    </div>
</div>  

@endsection