<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Mutation; // Import the Mutation model
use Illuminate\Http\Request;

class MutationController extends BaseController
{
    // Display a listing of the categories
    public function index()
    {
        $mutations = Mutation::orderBy('id', 'DESC')->get(); // Get all categories
        return $this->sendResponse($mutations); // Return as JSON
    }

    // Store a newly created mutation in storage
    public function store(Request $request)
    {
        $request->validate([
            'mutation_type' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
            'item_id' => 'required',
        ]);
    
        $mutation = Mutation::create($request->all()); // Create a new mutation
        return $this->sendResponse($mutation, '', 201); // Return the created mutation
    }

    // Display the specified mutation
    public function show($id)
    {
        $mutation = Mutation::find($id); // Find the mutation by ID
        if ($mutation) {
            return $this->sendResponse($mutation); // Return the mutation
        }
        return $this->sendError('Mutation Not Found!', 404);;
    }

    // Update the specified mutation in storage
    public function update(Request $request, $id)
    {

        $mutation = Mutation::find($id); // Find the mutation by ID
        if ($mutation) {
            $mutation->update($request->all()); // Update the mutation
            return $this->sendResponse($mutation);
        }
        return $this->sendError('Mutation Not Found!', 404);
    }

    // Remove the specified mutation from storage
    public function destroy($id)
    {

        $mutation = Mutation::find($id); // Find the mutation by ID
        if ($mutation) {
            $mutation->delete(); // Delete the mutation
            return $this->sendResponse($mutation);
        }
        return $this->sendError('Mutation Not Found', 404);
    }

    public function getMutationWithUser($mutation_id)
    {
        $data = Mutation::with('user')->find($mutation_id);
        if ($data) {
            return $this->sendResponse($data);
        }
        return $this->sendError('User not Found', 404);
    }
    public function getMutationWithItem($mutation_id)
    {
        $data = Mutation::with('item')->find($mutation_id);
        if ($data) {
            return $this->sendResponse($data);
        }
        return $this->sendError('User not Found', 404);
    }
    public function getMutationUser($mutation_id)
    {
        $data = Mutation::find($mutation_id)->user;
        if ($data) {
            return $this->sendResponse($data);
        }
        return $this->sendError('User not Found', 404);
    }
    public function getMutationItem($mutation_id)
    {
        $data = Mutation::find($mutation_id)->item;
        if ($data) {
            return $this->sendResponse($data);
        }
        return $this->sendError('User not Found', 404);
    }

    public function getAllMutationWithRelations()
    {
        $data = Mutation::with(['user', 'item'])->orderBy('id', 'DESC')->get();
        if ($data) {
            return $this->sendResponse($data);
        }
        return $this->sendError('User not Found', 404);
    }

    public function getMutationWithRelations($mutation_id)
    {
        $data = Mutation::with(['user', 'item'])->find($mutation_id);
        if ($data) {
            return $this->sendResponse($data);
        }
        return $this->sendError('User not Found', 404);
    }
}