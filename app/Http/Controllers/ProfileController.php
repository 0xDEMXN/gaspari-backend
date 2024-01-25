<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Profiles retrieved successfully.',
            'data' => Profile::all()
        ], 200);
    }

    public function show(Profile $profile)
    {
        return response()->json([
            'success' => true,
            'message' => 'Profile retrieved successfully.',
            'data' => $profile
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:profiles',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $profile = Profile::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Profile created successfully.',
            'data' => $profile
        ], 201);
    }

    public function update(Request $request, Profile $profile)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $profile->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'data' => $profile
        ], 200);
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json([
            'success' => true,
            'message' => 'Profile deleted successfully.',
            'data' => $profile
        ], 200);
    }
}
