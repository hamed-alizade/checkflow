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

    public function addState(State $state, State $after = null)
    {
        if($after) {
            $afterOrder = $this->isExist($after->getName());
            if ($afterOrder >= 0) {
                $firstSlice = array_slice($this->flow, 0, $afterOrder + 1);
                $secondSlice = array_slice($this->flow, $afterOrder + 1, count($this->flow));
                $this->flow = $firstSlice;
                $this->flow[$state->getName()] = $state;
                $this->flow = array_merge($this->flow, $secondSlice);
            }
            else {
                $this->flow[$state->getName()] = $state;
            }
        }
        else {
            $this->flow[$state->getName()] = $state;
        }
    }

    public function removeState(State $state)
    {
        $stateKey = $this->isExist($state->getName());
        if ($stateKey >= 0) {
            unset($this->flow[$state->getName()]);
        }
    }

    public function getFlow(): array
    {
        return $this->flow;
    }

    public function getState(string $stateName) : ? State
    {
        foreach($this->flow as $state) {
            if ($state->getName() == $stateName) {
                return $state;
            }
        }
        return null;
    }

    public function addAccessory(Flow $accessory)
    {
        $prefix = $accessory->getName();
        foreach($accessory->getFlow() as $key=>$state) {
            $this->flow[$prefix . '/' . $key] = $state;
        }
    }

    public function addArrayAsFlow(array $flow, State $after = null)
    {
        $tempFlow=[];
        foreach ($flow as $state) {
            $tempFlow[$state] = new State($state);
        }

        if($after) {
            $afterOrder = $this->isExist($after->getName());
            if ($afterOrder >= 0) {
                $firstSlice = array_slice($this->flow, 0, $afterOrder + 1);
                $secondSlice = array_slice($this->flow, $afterOrder + 1, count($this->flow));
                $this->flow = $firstSlice;
                $this->flow = array_merge($this->flow, $tempFlow);
                $this->flow = array_merge($this->flow, $secondSlice);
            }
            else {
                $this->flow = array_merge($this->flow, $tempFlow);
            }
        }
        else {
            $this->flow = array_merge($this->flow, $tempFlow);
        }
    }

    private function isExist(string $stateName) : int
    {
        $flowKey = array_keys($this->flow);
        $stateKey = array_search($stateName, $flowKey);
        if($stateKey < 0 or $stateKey === false) { return -1; }
        return $stateKey;
    }

    public function getNextState(string $currentStateName): string
    {
        $currentStateKey = $this->isExist($currentStateName);
        if($currentStateKey < 0) { abort(404); }
        $currentState = $this->flow[$currentStateName];
        $next = $currentState->getNext();
        if( ! $next) {
            $flowKey = array_keys($this->flow);
            if (isset($flowKey[$currentStateKey + 1])) {
                $next = '/' . $flowKey[$currentStateKey + 1];
            }
            else{
                $next = '/' . $currentStateName;
            }
        }
        return $next;
    }
}
