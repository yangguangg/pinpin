<?php

return [
    'autoload' => false,
    'hooks' => [
        'sms_send' => [
            'alisms',
        ],
        'sms_notice' => [
            'alisms',
        ],
        'sms_check' => [
            'alisms',
        ],
        'config_init' => [
            'nkeditor',
        ],
        'upgrade' => [
            'shopro',
        ],
        'app_init' => [
            'shopro',
        ],
    ],
    'route' => [],
    'priority' => [],
];
