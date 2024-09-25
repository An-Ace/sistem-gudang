<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MutationController;

Route::post('/signup', [AuthController::class, 'signUp']);
Route::post('/signin', [AuthController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/me', [AuthController::class, 'getUser']);
  Route::get('/signout', [AuthController::class, 'signOut']);

  Route::get('/users/withMutations', [UserController::class, 'getAllUserWithMutations']);
  Route::apiResource('users', UserController::class);
  Route::get('/users/{item_id}/withMutations', [UserController::class, 'getUserWithMutations']);
  Route::get('/users/{item_id}/mutations', [UserController::class, 'getUserMutations']);
  
  Route::get('/items/withMutations', [ItemController::class, 'getAllItemWithMutations']);
  Route::apiResource('items', ItemController::class);
  Route::get('/items/{item_id}/withMutations', [ItemController::class, 'getItemWithMutations']);
  Route::get('/items/{item_id}/mutations', [ItemController::class, 'getItemMutations']);
  
  Route::get('/mutations/withRelations', [MutationController::class, 'getAllMutationWithRelations']);
  Route::apiResource('mutations', MutationController::class);
  Route::get('/mutations/{mutation_id}/withRelations', [MutationController::class, 'getMutationWithRelations']);
  Route::get('/mutations/{mutation_id}/withUser', [MutationController::class, 'getMutationWithUser']);
  Route::get('/mutations/{mutation_id}/withItem', [MutationController::class, 'getMutationWithItem']);
  Route::get('/mutations/{mutation_id}/user', [MutationController::class, 'getMutationUser']);
  Route::get('/mutations/{mutation_id}/item', [MutationController::class, 'getMutationItem']);
  Route::get('/mutations/withRelations', [MutationController::class, 'getAllMutationWithRelations']);
});

Route::get('{any}', function () {
  return response()->json([
      'error' => true,
      'message' => 'API not found',
      'redirect' => ''
  ], 404);
})->where('any', '.*');