<?php

return [
    'hyper_pay'           => [
        'mada_entity_id'      => env('MADA_ENTITY_ID','8ac7a4c8812674e30181332a5bd438a0'),
        'visa_entity_id'      => env('VISA_ENTITY_ID','8ac7a4c8812674e301813329f8c0389c'),
        'authorization_token' => env('PAYMENT_AUTHORIZATION_TOKEN','Authorization:Bearer OGFjN2E0Yzg4MTI2NzRlMzAxODEzMzI4ZDI2ZTM4OTh8ZVAyc3dDV2FjaA=='),
        'urls'                => [
            'test_base_url'      => env('PAYMENT_URL', 'https://test.oppwa.com/'),
            'test_checkouts_url' => env('PAYMENT_URL', 'https://test.oppwa.com/v1/checkouts'),
        ]
    ]
];
