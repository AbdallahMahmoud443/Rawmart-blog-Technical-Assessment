<?php

declare(strict_types=1);

namespace App\Http\Controllers\v1\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\auth\SignupRequest;
use App\Models\User;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SignupRequest $request)
    {
        try {
            $userPayload = $request->payload();
            $imageName = time() . '_' . Str::random(10) . '.' . $userPayload->image->extension();
            $imagePath = $userPayload->image->storeAs('user_images', $imageName, 'public');
            $userData = $userPayload->toArray();
            $userData['image'] = $imagePath;
            $user = User::create($userData);
            $token = auth()->login($user);
            return response()->json([
                'message' => 'User created successfully',
                'token' => $token,
                'type' => 'Bearer',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
