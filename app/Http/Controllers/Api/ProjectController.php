<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['technologies', 'type'])->get();
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug) {
        $detail = Project::with(['technologies', 'type'])->where('slug', $slug)->first();

        if($detail) {
            return response()->json([
                "success" => true,
                "results" => $detail,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "results" => 'no',
            ]);
        }
    }
}
