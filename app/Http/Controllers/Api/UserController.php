<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Mail\ResetPassword;
use App\Models\Profile;
use App\Models\User;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\JWTAuth;

class UserController extends Controller
{
    /**
     * @var AuthService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function post(Request $request)
    {
        return response()->json($this->service->save($request->all()));
    }

}
