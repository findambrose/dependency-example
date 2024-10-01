<?php

namespace App\Services;

use App\Models\PaymentMethod;

class PaymentMethodService
{
    public function getMethodsByUser(int $id): mixed
    {
        return PaymentMethod::where('user_id', $id)->get();
    }

    public function create(array $data): PaymentMethod
    {
        return PaymentMethod::create($data);
    }
}
