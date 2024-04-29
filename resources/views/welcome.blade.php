@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col text-capitalize">name</th>
                        <th scope="col text-capitalize">description</th>
                        <th scope="col text-capitalize">cover</th>
                        <th scope="col text-capitalize">tech</th>
                        <th scope="col text-capitalize">github</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{$project->name}}</th>
                            <td>{{$project->description}}</td>
                            <td>{{$project->cover}}</td>
                            <td>{{$project->tech}}</td>
                            <td>{{$project->github}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
