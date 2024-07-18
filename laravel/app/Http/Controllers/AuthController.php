<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @OA\Post (
     *     path="/api/auth/register",
     *     tags={"Auth"},
     *     summary="註冊使用者",
     *     description="註冊使用者",
     *     @OA\RequestBody(
     *         required=true,
     *         description="User",
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(type="string", property="name", description="使用者名稱"),
     *             @OA\Property(type="string", property="email", description="email"),
     *             @OA\Property(type="string", property="password", description="password"),
     *         )
     *     ),
     *     @OA\Response (
     *          response=201,
     *          description="請求成功"
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        Auth::login($user);

        return response()->noContent();
    }

    /**
     * @OA\Post (
     *     path="/api/auth/login",
     *     tags={"Auth"},
     *     summary="登入使用者",
     *     description="登入使用者",
     *     @OA\RequestBody(
     *         required=true,
     *         description="User",
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(type="string", property="email", description="email"),
     *             @OA\Property(type="string", property="password", description="password"),
     *         )
     *     ),
     *     @OA\Response (
     *          response=201,
     *          description="請求成功",
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|lowercase|email|max:255',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return response()->noContent();
    }

    /**
     * @OA\Get (
     *     path="/api/auth/profile",
     *     tags={"Auth"},
     *     summary="使用者資訊",
     *     description="使用者資訊",
     *     @OA\Response (
     *          response=200,
     *          description="請求成功",
     *              @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                    @OA\Property(type="integer", property="id", description="id"),
     *                    @OA\Property(type="string", property="name", description="name"),
     *                    @OA\Property(type="string", property="email", description="email"),
     *                 )
     *             )
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function me(Request $request)
    {
        return response($request->user());
    }

    /**
     * @OA\Post (
     *     path="/api/auth/logout",
     *     tags={"Auth"},
     *     summary="登出",
     *     description="登出",
     *     @OA\Response (
     *          response=201,
     *          description="請求成功",
     *     ),
     *     @OA\Response (
     *          response=400,
     *          ref="#/components/responses/400",
     *     ),
     *     @OA\Response (
     *          response=401,
     *          ref="#/components/responses/401",
     *     ),
     *     @OA\Response (
     *          response=500,
     *          ref="#/components/responses/500",
     *     )
     * )
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->flush();

        return response()->noContent();
    }
}
