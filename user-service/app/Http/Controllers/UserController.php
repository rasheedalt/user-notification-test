<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request, Response $response)
    {
        $data = $request->only(['email', 'firstName', 'lastName']);

        Log::info(json_encode($data));

        Redis::publish('user:created', json_encode($data));
        return response()->json($data);
    }
}
