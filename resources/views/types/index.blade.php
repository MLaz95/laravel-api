@extends('layouts.app')

@section('content')
    <h1>All Categories</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr class="text-capitalize">
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">buttons</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td class="text-capitalize">{{ $type->title }}</td>
                    <td>
                        <div class="h-100 d-flex gap-3">
                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('types.create') }}" class="btn btn-primary">Add a new Type</a>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
@endsection
