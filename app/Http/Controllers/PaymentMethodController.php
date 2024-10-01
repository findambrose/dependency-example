<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Services\PaymentMethodService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PaymentMethodController extends Controller
{

    public function __construct(protected PaymentMethodService $paymentMethodService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            return response()->json(
                $this->paymentMethodService->getMethodsByUser($request->user_id)
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while processing your request.',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     * Method Injection
     */
    public function store(Request $request, PaymentMethodService $paymentMethodService): JsonResponse
    {
        try {
            return response()->json(
                $paymentMethodService->create($request->all())
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while processing your request.',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //
    }
}
