<?php

namespace App\Services;

use App\Services\State;

class Flow
{
    private $name = '';
    private $flow = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addState(State $state)
    {
        $this->flow[$state->getName()] = $state;
    }

    public function getNextState(string $currentStateName): string
    {
        $flowKey = array_keys($this->flow);
        $currentStateKey = array_search($currentStateName, $flowKey);
        if($currentStateKey < 0){ abort(404); }
        $currentState = $this->flow[$currentStateName];
        $next = $currentState->getNext();
        if( ! $next) { $next = '/' . $flowKey[$currentStateKey + 1]; }
        return $next;
    }
}
