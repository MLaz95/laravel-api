@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end gap-2 align-items-center">
        <a href="{{ route('projects.create') }}" class="btn btn-primary my-2">Add a Project</a>
        <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a href="{{ route('types.index') }}" class="dropdown-item">Manage Project Types</a></li>
            <li><a href="{{ route('technologies.index') }}" class="dropdown-item">Manage Technologies</a></li>
        </ul>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="text-capitalize">
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">type</th>
                <th scope="col">github</th>
                <th scope="col">buttons</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row" class="text-capitalize">{{ $project->name }}</th>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->type?->title }}</td>
                    <td>{{ $project->github }}</td>
                    <td >
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
