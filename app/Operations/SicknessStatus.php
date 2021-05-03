<?php

namespace App\Operations;

use App\Services\Operation;

class SicknessStatus extends Operation
{
    public function getNextStateName() : string
    {
//        return '/sick/select';
        return '';
    }

}
