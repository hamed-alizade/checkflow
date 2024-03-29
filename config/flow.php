<?php

return [
    'auth' => [
        '/',
        '%checkRegistryStatus$response',
        '/verify',
        '%checkIfUserVerified$response',
        '/register',
        '%startRegProcess',
        '/login',
        '%checkFlow$userId',
        '/login/forget',
        '/pass/verify',
        '%checkIfResetVerified$response',
        '/pass/reset',
        '%checkFlow$userId',
    ],

    'reg' => [
        '/diet/type',
        '/size',
        '/report',
        '/sick/select',
    //        '/special',
        '/package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%startPaymentProcess',
        '/activity',
        '/diet/history',
        '/diet/goal',
        '/overview',
        '%checkCountry$userId',
        '/messenger',
        '%checkHavingPhysicalPackage$userId',
        '/postal',
        '/menu/select',
        '/menu/confirm',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ],

    'renew' => [
        '/alert',
        '/diet/type',
        '/weight',
        '/sick/select',
    //        '/special',
        '/package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%startPaymentProcess', //?
        '/activity',
        '%checkHavingPhysicalPackage$userId',
        '/postal',
        '/menu/select',
        '/menu/confirm',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ],

    'revive' => [
        '/alert',
        '/diet/type',
        '/size',
        '/sick/select',
    //        '/special',
        '/package',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%startPaymentProcess', //?
        '/activity',
        '%checkHavingPhysicalPackage$userId',
        '/postal',
        '/menu/select',
        '/menu/confirm',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ],

    'payment' => [
        '/payment/bill',
        '%checkPaymentType$paymentTypeId',
        '/payment/card',
        '/payment/card/wait',
        '%checkCardPaymentStatus$userId',
        '/payment/card/confirm',
        '%goForNextStep',
        '/payment/online/success',
        '%goForNextStep',
        '/payment/online/fail',
        '%startPaymentProcess',
        '/payment/card/reject',
        '%startPaymentProcess',
    ],

    'list' => [
        '%startList',
        '%checkVisitStatus$userId',
        '/view',
        '%checkVisitStatus$userId',
        '/menu/alert',
        '/menu/select',
        '%checkMenuType$userId',
        '/food',
        '%checkVisitStatus$userId',
        '/weight/alert',
        '/weight/enter',
        '/sick/select',
    //        '/special',
        '%checkDietPermission$userId',
        '%checkSicknessStatus$userId',
        '%startFoodListProcess',
        '/sick/block',
        '%checkSicknessStatus$userId',
    ]
];
