<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function index($id){

        // Retrieve the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Retrieve the workspace
        $workspace = $user->workspaces()->find($id);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        // Retrieve the projects
        $projects = $workspace->projects()->get();
        return response()->json($projects);
    }

    public function store(Request $request, $id){

        // Retrieve the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Retrieve the workspace
        $workspace = $user->workspaces()->find($id);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->workspace_id = $workspace->id;
        $project->save();

        return response()->json($project);
    }

    public function show($workspaceId, $projectId){

        // Retrieve the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Retrieve the workspace
        $workspace = $user->workspaces()->find($workspaceId);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        // Retrieve the project
        $project = $workspace->projects()->find($projectId);

        if (!$project) {
            return response()->json(['message' => 'project not found'], 404);
        }

        return response()->json($project);
    }

    public function update(Request $request, $workspaceId, $projectId){

        // Retrieve the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Retrieve the workspace
        $workspace = $user->workspaces()->find($workspaceId);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        // Retrieve the project
        $project = $workspace->projects()->find($projectId);

        if (!$project) {
            return response()->json(['message' => 'project not found'], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return response()->json($project);
    }

    public function destroy($workspaceId, $projectId){

        // Retrieve the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Retrieve the workspace
        $workspace = $user->workspaces()->find($workspaceId);

        if (!$workspace) {
            return response()->json(['message' => 'Workspace not found'], 404);
        }

        // Retrieve the project
        $project = $workspace->projects()->find($projectId);

        if (!$project) {
            return response()->json(['message' => 'project not found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted']);
    }
}
