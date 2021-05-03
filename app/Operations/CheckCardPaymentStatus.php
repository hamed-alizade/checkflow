<?php
namespace App\Operations;

use App\Services\Operation;

class CheckCardPaymentStatus extends Operation
{
    public function getNextStateName(): string
    {
//        if ($user->payment->successful) {
//            return '/payment/card/confirm';
//        }
//        elseif($user->payment->fail){
//            return '/payment/card/reject';
//        }
//        else {
//            return '/payment/card/wait';
//        }
        return '/payment/card/confirm';
    }
}
