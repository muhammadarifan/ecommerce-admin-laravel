<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerMessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerMessageController extends Controller
{
    public function __construct(CustomerMessageRepository $customerMessageRepository)
    {
        $this->customerMessageRepository = $customerMessageRepository;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'elapsed_time' => round((microtime(true) - LARAVEL_START) * 1000, 2),
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
                'data' => null,
            ], 400);
        }

        $this->customerMessageRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return response()->json([
            'elapsed_time' => round((microtime(true) - LARAVEL_START) * 1000, 2),
            'status' => 'success',
            'message' => 'Customer message created successfully',
            'errors' => [],
            'data' => null,
        ], 200);
    }
}
