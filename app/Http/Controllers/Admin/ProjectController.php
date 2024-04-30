<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
USE App\Http\Requests\StoreProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();
        // dd($projects);
        return view('projects.dashboard', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $newProject = new Project();

        if($request->hasFile('cover')){
            $path = Storage::disk('public')->put('cover_images', $request->cover);
            $newProject->cover = $path;
        }

        $newProject->fill($request->all());
        $newProject->slug = Str::slug($newProject->name);
        $newProject->save();

        // we are attaching the project id to the tech id and adding that pair to the pivot table
        // this HAS to happen AFTER save() because otherwise the id for the new project doesn't exist
        $newProject->technologies()->attach($request->technologies);

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $request->validated();
        if($request->hasFile('cover')){
            $path = Storage::disk('public')->put('cover_images', $request->cover);
            $project->cover = $path;
        }
        $project->update($request->all());
        $project->slug = Str::slug($request->name);

        // sync() looks at all the ids I'm trying to add to the pivot table, adds those, and removes any others
        $project->technologies()->sync($request->technologies);
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('projects.index'));
    }
}
