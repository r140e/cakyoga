<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')
                            ->withCount(['tasks' => function ($query) {
                              $query->where('is_completed', false);
                            }])
                            ->get();

        return $projects->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'place' => 'required',
            'tool' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);
        $project = Project::create([
            'name' => $validatedData['name'],
            'place' => $validatedData['place'],
            'tool' => $validatedData['tool'],
            'start' => $validatedData['start'],
            'end' => $validatedData['end'],
            'description' => $validatedData['description'],
        ]);

        return response()->json('Project created!');
    }

    public function show($id)
    {
        $project = Project::with(['tasks' => function ($query) {
            $query->where('is_completed', false);
        }])->find($id);

        return $project->toJson();
    }

    public function markAsCompleted(Project $project)
    {
        $project->is_completed = true;
        $project->update();

        return response()->json('Project updated!');
    }

    public function showEdit($id)
    {
        $project = Project::find($id);

        return $project->toJson();
    }

    public function edit(Project $project, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'place' => 'required',
            'tool' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ]);
        $project->name = $validatedData['name'];
        $project->place = $validatedData['place'];
        $project->tool = $validatedData['tool'];
        $project->start = $validatedData['start'];
        $project->end = $validatedData['end'];
        $project->description = $validatedData['description'];
        $project->update();

        return response()->json('Project updated!');
    }
}
