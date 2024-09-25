<?php

namespace App\Http\Controllers;
use App\Models\User; // Import the User model
use App\Models\Mutation; // Import the Mutation model
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    // Display a listing of the categories
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get(); // Get all categories
        return $this->sendResponse($users); // Return as JSON
    }

    // Display the specified user
    public function show($id)
    {
        $user = User::find($id); // Find the user by ID
        if ($user) {
            return $this->sendResponse($user);
        }
        return $this->sendError('User not Found', 404);
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {

        $user = User::find($id); // Find the user by ID
        if ($user) {
            $user->update($request->all()); // Update the user
            return $this->sendResponse($user);
        }
        return $this->sendError('User not Found', 404);
    }

    // Remove the specified user from storage
    public function destroy($id)
    {

        $user = User::find($id); // Find the user by ID
        if ($user) {
            $user->delete(); // Delete the user
            return response()->json(['error' => false, 'data' => $user]);
        }
        return $this->sendError('User not Found', 404);
    }

    public function getAllUserWithMutations()
    {
        $user = User::with('mutations.item')->orderBy('id', 'DESC')->get(); // Find the user by ID
        if ($user) {
            return response()->json(['error' => false, 'data' => $user]);
        }
        return $this->sendError('User not Found', 404);
    }
    public function getUserWithMutations($user_id)
    {
        $user = User::with('mutations')->find($user_id); // Find the user by ID
        if ($user) {
            return response()->json(['error' => false, 'data' => $user]);
        }
        return $this->sendError('User not Found', 404);
    }

    public function getUserMutations($user_id)
    {
        $user = User::find($user_id)->mutations; // Find the user by ID
        if ($user) {
            return response()->json(['error' => false, 'data' => $user]);
        }
        return $this->sendError('User not Found', 404);
    }

}
