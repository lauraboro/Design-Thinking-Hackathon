<?php

namespace App\Http\Controllers;

use App\Models\GroceryList;
use App\Models\User;
use Illuminate\Http\Request;

/**
 *  Controller for handling the login and registration of user.
 *  On  first registration a new grocery list ges created for the new user.
 */
class AuthController
{
    public function register(Request $request): string {
        $userExists = User::where('username', $request->username)->exists();
        if ($userExists) {
            return response()->json(['message' => 'Username already exists'], 400);
        }

        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();

        //create new List for each new user (each user has one list)
        $groceryList = new GroceryList();
        $groceryList->user_id = $user->id;
        $groceryList->save();

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request): string {
        $maybeUser = User::where('username', $request->username)
            ->where('password', $request->password);
        if ($maybeUser === null) {
            return response()->json(['message' => 'Wrong username or password'], 400);
        }

        return response()->json(['message' => 'User logged in'], 201);
    }
}
