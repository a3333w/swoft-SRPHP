<?php
return [
    'name'  => 'Swoft framework 2.0',
    'debug' => env('SWOFT_DEBUG', 1),
    'external_uri'=>'http://gift.1liwu.cn',
    //'IP_RANGE'=>'123.115.212.1-254',
    'IP_RANGE'=>'127.0.0.1',
    'EO_IP_RANGE'=>'47.103.65.1-254',
    'api'   =>[
        'ThDuOtQzfnOy7uy'=>[
            'app_key'   =>'ThDuOtQzfnOy7uy',
            'app_secret'=>'EFQbuFQ0EmAeUvWjy62d8rP1cI8qnr',
            'ip_range'=>'123.0.0.1-123.254.254.254'
        ]
    ],
    'weipay'=>[
        'M_Appid' => 'wxbbf52c8ead7f864d',
        'M_PartnerId' => '1488605962',
        'M_PartnerKey' => 'lankayouxuan13141314lankayouxuan',
        'M_Appsecret' => 'ec845af2d778f06c5be7a828ffded103',
        'NOTIFY_URL'=>'http://123.56.162.249:18306/weipay/callback'
    ],
    'sms'=>[
        'key'=>'LTAIs7i8F3JeVw3B',
        'secret'=>'J8G88S2PR3IBsRNKK2WFNJz3wYOFdk'
    ],
    'role'=>[
        'Administration'=>'admin',
        'ordinary'=>'user'
    ]
];
