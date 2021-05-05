<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class flowController extends Controller
{
    public function getNext(request $request) : string
    {
        return $this->reg->getNextState($request['flow']);
    }
}
