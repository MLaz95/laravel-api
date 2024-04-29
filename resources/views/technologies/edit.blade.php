@extends('layouts.app')

@section('content')

<form action="{{ route('technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label text-capitalize">tech title</label>
        <input type="text" class="form-control  @error('title') is-invalid @enderror" value="{{ $technology->title }}"
            name="title">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="color" class="form-label text-capitalize">color</label>
        <input type="color" name="color" class="form-control"
            value="{{ $technology->color }}"
            style="width: 5%;"
            >
    </div>

    <div class="d-flex gap-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('technologies.index') }}" class="btn btn-secondary">Back</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you wish to delete this project technology?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go
                    Back</button>

                <form action="{{ route('technologies.destroy', $technology->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

