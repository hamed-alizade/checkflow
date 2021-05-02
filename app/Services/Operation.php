<?php

namespace App\Services;

interface Operation
{
    public function getNextStateName() : string;
}
