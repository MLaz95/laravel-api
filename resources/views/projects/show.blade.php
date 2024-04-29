@extends('layouts.app')

@section('content')

<div class="d-flex gap-3">
    <img src="{{asset('storage/' . $project->cover)}}" alt="">
    <div>
        <h2>{{$project->name}}</h2>
        <h4 class="text-capitalize text-secondary">{{$project->type?->title}}</h4 class="text-capitalize">
        <div class="d-flex gap-2 mb-5">
            @foreach($project->technologies as $tech)
            <span class="badge rounded-pill" style="background-color: {{ $tech->color }}">{{ $tech->title }}</span>
            @endforeach
        </div>
        <p>{{$project->description}}</p>
        <div>{{$project->tech}}</div>
        <div>{{$project->github}}</div>

        <div class="d-flex gap-3 my-3">
            <a href="{{route('projects.index')}}" class="btn btn-secondary">Back</a>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure you wish to remove this project from
                        the portfolio?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go
                        Back</button>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection