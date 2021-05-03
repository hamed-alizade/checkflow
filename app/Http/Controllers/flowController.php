<?php

namespace App\Http\Controllers;

use App\Operations\CheckCardPaymentStatus;
use App\Operations\DietTypePermission;
use App\Operations\EndPaymentProcess;
use App\Operations\SicknessStatus;
use App\Operations\StartPayment;
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
        $startPayment = new StartPayment();
        $package->setOperation($dietTypePermission);
        $package->setOperation($sicknessStatus);
        $package->setOperation($startPayment);

        $payment = new Flow('payment');
        $bill = new State('bill');
        $card = new State('card');
        $cardWait = new State('card/wait');
        $cardConfirm = new State('card/confirm');
        $cardReject = new State('card/reject');
        $checkCardPaymentStatus = new CheckCardPaymentStatus();
        $endPaymentProcess = new EndPaymentProcess();
        $cardWait->setOperation($checkCardPaymentStatus);
        $cardConfirm->setOperation($endPaymentProcess);
        $cardReject->setOperation($endPaymentProcess);

        $payment->addState($bill);
        $payment->addState($card);
        $payment->addState($cardWait);
        $payment->addState($cardConfirm);
        $payment->addState($cardReject);

        $reg->addState($dietType);
        $reg->addState($size);
        $reg->addState($report);
        $reg->addState($sickSelect);
        $reg->addState($package);

        $test=new Flow('test');
        $type = new State('test_type');
        $type2 = new State('test_type2');
        $test->addState($type);
        $test->addState($type2);
        
        $payment->addAccessory($test);

        $reg->addAccessory($payment);

//        dd($reg->getFlow());
        return $reg->getNextState($request['flow']);
    }
}
