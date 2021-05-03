<?php
namespace App\Operations;

use App\Services\Operation;

class StartPayment extends Operation
{
    public function getNextStateName(): string
    {
        return '/payment/bill';
    }
}
