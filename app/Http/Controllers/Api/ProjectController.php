<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // returns json of all projects four at a time
    public function index() {

        // eager loading with type and tech, 4 projects per page
        $projects = Project::with(['type', 'technologies'])->paginate(8);

        return response()->json([
            "success" => true,
            "results" => $projects
        ]);

    }

    // returns json of single project
    public function show($slug){
        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();

        if($project) {
            return response()->json([
                "success" => true,
                "project" => $project
            ]); 
        } else {
            return response()->json([
                "success" => false,
                "error" => "Project not found"
            ]);
        }

    }

    public function search($query){
        $projects = Project::with(['type', 'technologies']);
        $filtered = $projects->where('name', 'LIKE', '%' . $query . '%')->paginate(4);

        return response()->json([
            "success" => true,
            "results" => $filtered
        ]);

    }
}
