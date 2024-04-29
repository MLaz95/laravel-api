@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col text-capitalize">id</th>
                <th scope="col text-capitalize">title</th>
                <th scope="col text-capitalize">color</th>
                <th scope="col text-capitalize">buttons</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $tech)
                <tr>
                    <th scope="row">{{ $tech->id }}</th>
                    <td>{{ $tech->title }}</td>
                    <td>{{ $tech->color }}</td>
                    <td>
                        <div class="h-100 d-flex gap-3">
                            <a href="{{ route('technologies.edit', $tech->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('technologies.create') }}" class="btn btn-primary">Add a new Tech</a>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you wish to delete {{ $tech->title }}?
                        It will be removed from any project it's assigned to</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                    <form action="{{ route('technologies.destroy', $tech->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
