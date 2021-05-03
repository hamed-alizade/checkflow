<?php
namespace App\Operations;

use App\Services\Operation;

class EndPaymentProcess extends Operation
{
    public function getNextStateName(): string
    {
        return '/activity';
    }
}
