@extends('layouts.app')

@section('content')

<form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label text-capitalize">type title</label>
        <input type="text" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}"
            name="title">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-flex gap-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('types.index') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection