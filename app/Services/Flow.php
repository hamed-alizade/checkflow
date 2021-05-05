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

    public function getFlow(): array
    {
        return $this->flow;
    }

    public function addAccessory(Flow $accessory)
    {
        $prefix = $accessory->getName();
        foreach($accessory->getFlow() as $key=>$state) {
            $this->flow[$prefix . '/' . $key] = $state;
        }
    }

    private function getStateKey(string $stateName)
    {
        $flowKey = array_keys($this->flow);
        $stateKey = array_search($stateName, $flowKey);
        if($stateKey < 0 or $stateKey == false) { return -1; }
        return $stateKey;
    }

    public function getNextState(string $currentStateName): string
    {
        $currentStateKey = $this->getStateKey($currentStateName);
        if($currentStateKey < 0) { abort(404); }
        $currentState = $this->flow[$currentStateName];
        $next = $currentState->getNext();
        if( ! $next) {
            if (isset($flowKey[$currentStateKey + 1])) {
                $next = '/' . $flowKey[$currentStateKey + 1];
            }
            else{
                $next = $currentStateName;
            }
        }
        return $next;
    }
}
