@extends('layouts.app')

@section('content')
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-capitalize">Project Name</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}"
                name="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label  text-capitalize">description</label>
            <textarea type="password" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label text-capitalize">cover</label>
            <input type="file" class="form-control @error('cover') is-invalid @enderror" value="{{ old('cover') }}"
                name="cover">
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="technology" class="form-label text-capitalize">technologies</label>
            <div class="d-flex gap-4">
                {{-- make a checkbox for each tech on the list --}}
                @foreach($technologies as $tech)
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            {{-- all selected boxes add their values to the same array --}}
                            name="technologies[]"
                            {{-- value matches the id from the technologies table --}}
                            value="{{ $tech->id }}"
                            id="tech-{{ $tech->id }}"
                            {{-- this is to retain selected boxes when validation fails --}}
                            {{-- it assigns 'checked' to boxes with id contained in old('technologies'), leaves all blank if old('technologies') doesn't exist--}}
                            {{in_array($tech->id, old('technologies', [])) ? 'checked' : ''}}
                        >
                        <label for="tech-{{ $tech->id }}" class="form-label text-capitalize">{{ $tech->title }}</label>

                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="mb-3">
            <label for="type_id" class="form-label text-capitalize">type</label>
            <select class="form-control" name="type_id">
                {{-- empty option to allow for null value --}}
                <option value=""></option>
                {{-- adds an option for each type present in the types table --}}
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="github" class="form-label text-capitalize">github</label>
            <input type="text" class="form-control @error('github') is-invalid @enderror" value="{{ old('github') }}"
                name="github">
            @error('github')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
