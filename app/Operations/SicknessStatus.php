<?php

namespace App\Operations;

use App\Services\Operation;

class SicknessStatus implements Operation
{
    public function getNextStateName() : string
    {
        return '/sick/select';
    }

}
