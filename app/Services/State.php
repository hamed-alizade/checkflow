<?php

namespace App\Services;

use App\Services\Operation;

class State
{
    private $name;
    private $operations = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setOperation(Operation $operation)
    {
        $this->operations[] = $operation;
    }

    public function getNext(): string
    {
        $next = '';
        foreach ($this->operations as $operation) {
            $next = $operation->getNextStateName();
            if ( ! empty($next)) {
                break;
            }
        }
        return $next;
    }

    public function getOperations() : array
    {
        return $this->operations;
    }
}
