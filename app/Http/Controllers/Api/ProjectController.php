<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {

        // eager loading with type and tech, 4 projects per page
        $projects = Project::with(['type', 'technologies'])->paginate(4);

        return response()->json([
            "success" => true,
            "results" => $projects
        ]);

    }
}
