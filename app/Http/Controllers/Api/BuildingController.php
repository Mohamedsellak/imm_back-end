<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
{
    public function index($workspaceId,$siteId){

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

        // Retrieve the projects
        $site = $workspace->sites()->find($siteId);

        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        }

        $buildings =  $site->buildings()->get();

        if (!$buildings) {
            return response()->json(['message' => 'buildings not found'], 404);
        }

        return response()->json($buildings);

    }

    public function store(Request $request, $workspaceId,$siteId){

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

        // Retrieve the workspace
        $site = $workspace->sites($siteId);

        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'code'=> 'required|string|max:255|min:3',
            'name'=> 'required|string|max:255|min:3',
            'activity'=> 'required|string|max:255|min:3',
            'year_of_construction'=> 'required|string|max:255|min:3',
            'surface'=> 'required|string|max:255|min:3',
            'type'=> 'required|string|max:255|min:3',
            'level_count'=> 'required|string|max:255|min:3',
            'structure_state'=> 'required|string|max:255|min:3',
            'electricity_inventory'=> 'required|string|max:255|min:3',
            'plumbing_state'=> 'required|string|max:255|min:3',
            'cvc_state'=> 'required|string|max:255|min:3',
            'fire_safety_evaluation'=> 'required|string|max:255|min:3',
            'elevator_escalator_state'=> 'required|string|max:255|min:3',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create and save the building
        $building = new Building($request->all());
        $building->site_id = $siteId;
        $building->save();

        return response()->json($building);
    }

    public function show($workspaceId, $siteId,$buildingId){

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
        $site = $workspace->sites()->find($siteId);

        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        }

        // Retrieve the Building
        $building = $site->buildings()->find($buildingId);

        if (!$building) {
            return response()->json(['message' => 'building not found'], 404);
        }

        return response()->json($building);
    }

    public function update(Request $request, $workspaceId, $siteId,$buildingId){

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

        // Retrieve the site
        $site = $workspace->sites()->find($siteId);

        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        }

        // Retrieve the building
        $building = $site->buildings()->find($buildingId);

        if (!$building) {
            return response()->json(['message' => 'building not found'], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'code'=> 'required|string|max:255|min:3',
            'name'=> 'required|string|max:255|min:3',
            'activity'=> 'required|string|max:255|min:3',
            'year_of_construction'=> 'required|string|max:255|min:3',
            'type'=> 'required|string|max:255|min:3',
            'level_count'=> 'required|string|max:255|min:3',
            'structure_state'=> 'required|string|max:255|min:3',
            'electricity_inventory'=> 'required|string|max:255|min:3',
            'plumbing_state'=> 'required|string|max:255|min:3',
            'cvc_state'=> 'required|string|max:255|min:3',
            'fire_safety_evaluation'=> 'required|string|max:255|min:3',
            'elevator_escalator_state'=> 'required|string|max:255|min:3',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $building->code = $request->code;
        $building->name = $request->name;
        $building->activity = $request->activity;
        $building->year_of_construction = $request->year_of_construction;
        $building->type = $request->type;
        $building->level_count = $request->level_count;
        $building->structure_state = $request->structure_state;
        $building->electricity_inventory = $request->electricity_inventory;
        $building->plumbing_state = $request->plumbing_state;
        $building->cvc_state = $request->cvc_state;
        $building->fire_safety_evaluation = $request->fire_safety_evaluation;
        $building->elevator_escalator_state = $request->elevator_escalator_state;
        $building->save();

        return response()->json($building);
    }

    public function destroy($workspaceId, $siteId,$buildingId){

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
        $site = $workspace->sites()->find($siteId);

        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        }

        // Retrieve the Building
        $building = $site->buildings()->find($buildingId);

        if (!$building) {
            return response()->json(['message' => 'building not found'], 404);
        }

        $building->delete();

        return response()->json(['message' => 'building deleted']);
    }
}
