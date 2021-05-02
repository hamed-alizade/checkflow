<?php

namespace App\Http\Controllers;

use App\Operations\DietTypePermission;
use App\Operations\SicknessStatus;
use App\Services\Flow;
use App\Services\Operation;
use App\Services\State;
use Illuminate\Http\Request;

class flowController extends Controller
{
    public function getNext(request $request)
    {
        $reg = new Flow('reg');
        $dietType = new State('diet/type');
        $size = new State('size');
        $report = new State('report');
        $sickSelect = new State('sick/select');
        $package = new State('package');
        $dietTypePermission = new DietTypePermission();
        $sicknessStatus = new SicknessStatus();

        $package->setOperation($dietTypePermission);
        $package->setOperation($sicknessStatus);

        $reg->addState($dietType);
        $reg->addState($size);
        $reg->addState($report);
        $reg->addState($sickSelect);
        $reg->addState($package);

        return $reg->getNextState($request['flow']);
    }
}
