<?php

namespace App\Operations;

use App\Services\Operation;

class DietTypePermission implements Operation
{
    public function getNextStateName(array $arguments): string
    {
//        return '/diet/type';
        return '';
    }
}
