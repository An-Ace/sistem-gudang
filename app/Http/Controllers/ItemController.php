<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Item; // Import the Item model
use App\Models\Mutation; // Import the Mutation model
use Illuminate\Http\Request;

class ItemController extends BaseController
{
    // Display a listing of the categories
    public function index()
    {
        $items = Item::orderBy('id', 'ASC')->get(); // Get all categories
        return $this->sendResponse($items); // Return as JSON
    }

    // Store a newly created item in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:items',
            'category' => 'required',
            'location' => 'required',
        ]);
    
        $item = Item::create($request->all()); // Create a new item
        return $this->sendResponse($item, '', 201); // Return the created item
    }

    // Display the specified item
    public function show($id)
    {
        $item = Item::find($id); // Find the item by ID
        if ($item) {
            return $this->sendResponse($item); // Return the item
        }
        return $this->sendError('Item Not Found!', 404);;
    }

    // Update the specified item in storage
    public function update(Request $request, $id)
    {

        $item = Item::find($id); // Find the item by ID
        if ($item) {
            $item->update($request->all()); // Update the item
            return $this->sendResponse($item);
        }
        return $this->sendError('Item Not Found!', 404);
    }

    // Remove the specified item from storage
    public function destroy($id)
    {

        $item = Item::find($id); // Find the item by ID
        if ($item) {
            $item->delete(); // Delete the item
            return $this->sendResponse($item);
        }
        return $this->sendError('Item Not Found', 404);
    }

    public function getAllItemWithMutations()
    {
        $item = Item::with('mutations.user')->orderBy('id', 'DESC')->get(); // Find the user by ID
        if ($item) {
            return response()->json(['error' => false, 'data' => $item]);
        }
        return $this->sendError('User not Found', 404);
    }
    public function getItemWithMutations($item_id)
    {
        $item = Item::with('mutations')->find($item_id); // Find the user by ID
        if ($item) {
            return response()->json(['error' => false, 'data' => $item]);
        }
        return $this->sendError('User not Found', 404);
    }

    public function getItemMutations($item_id)
    {
        $item = Item::find($item_id)->mutations; // Find the user by ID
        if ($item) {
            return response()->json(['error' => false, 'data' => $item]);
        }
        return $this->sendError('User not Found', 404);
    }
}