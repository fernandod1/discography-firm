@extends('layout')

@section('content')

<div class="card mt-5">
    <h3 class="card-header">LPs listing</h3>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('lps.create') }}"><i class="fa fa-plus"></i> New LP</a>
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
                @forelse ($lps as $lp)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td><a href={{ route('lps.show', $lp->id) }}>{{ $lp->name }}</a></td>
                        <td>{{ $lp->description }}</td>
                        <td>
                            <form action="{{ route('lps.destroy',$lp->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('lps.show',$lp->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('lps.edit',$lp->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
        
        {!! $lps->links() !!}

    </div>
</div>  

@endsection