<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        // Retrieve the authenticated user
        $user = auth()->user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Retrieve the user's workspaces
        $workspaces = $user->workspaces;

        // Return the workspaces as a JSON response
        return response()->json($workspaces);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
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

        // Create the workspace
        $workspace = Workspace::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);

        if ($workspace) {
            return response()->json($workspace, 201);
        } else {
            return response()->json(['message' => 'Workspace not created'], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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

        // Return the workspace as a JSON response
        return response()->json($workspace);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
            'description' => 'required|string|max:255|min:3'
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $workspace->name = $request->name;
        $workspace->description = $request->description;

        $workspace->save();

        // Return the updated workspace as a JSON response
        return response()->json($workspace);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
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

        // Delete the workspace
        $workspace->delete();

        // Return a success message
        return response()->json(['message' => 'Workspace deleted successfully'], 200);
    }
}
