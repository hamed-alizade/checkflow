<?php

namespace App\Services;

abstract class Operation
{
    protected $arguments=[];
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }

    public function getArguments() : array
    {
        return $this->arguments;
    }

    abstract public function getNextStateName() : string;
}
