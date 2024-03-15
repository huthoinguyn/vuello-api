<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth:api');
    }

    public function index(){
        $users = UserResource::collection(User::all());

        return response()->json($users);
    }
}
