<?php

use App\Enums\NotificationStatusEnum;
use App\Enums\NotificationTypeEnum;
use App\Enums\ProductableEnum;

return [
    'notification' => [
        'type' => [
            NotificationTypeEnum::SMS->value => 'Sms',
            NotificationTypeEnum::EMAIL->value => 'Email',
        ],
        'status' => [
            NotificationStatusEnum::CREATED->value => 'Created',
            NotificationStatusEnum::QUEUED->value => 'Queue',
            NotificationStatusEnum::DELIVERED->value => 'Delivered',
            NotificationStatusEnum::NOT_DELIVERED->value => 'Not Deliver'
        ]
    ],
    'product' => [
        'type' => [
            ProductableEnum::SHIPPING_SYSTEM->value => 'Shipping System'
        ]
    ]
];
