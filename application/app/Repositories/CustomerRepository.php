<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    /**
     * Pega pelo id da carteira
     * @param string $walletId
     * @return Customer
     */
    public function findById(string $customerId): Customer
    {
        return Customer::query()->find($customerId);
    }
}
