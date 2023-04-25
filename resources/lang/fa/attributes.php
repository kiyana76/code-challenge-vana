<?php

use App\Enums\NotificationStatusEnum;
use App\Enums\NotificationTypeEnum;
use App\Enums\ProductableEnum;

return [
    'notification' => [
        'type' => [
            NotificationTypeEnum::SMS->value => 'اس ام اس',
            NotificationTypeEnum::EMAIL->value => 'ایمیل',
        ],
        'status' => [
            NotificationStatusEnum::CREATED->value => 'ایجاد شده',
            NotificationStatusEnum::QUEUED->value => 'در صف ارسال',
            NotificationStatusEnum::DELIVERED->value => 'دریافت شده',
            NotificationStatusEnum::NOT_DELIVERED->value => 'دریافت نشده'
        ]
    ],
    'product' => [
        'type' => [
            ProductableEnum::SHIPPING_SYSTEM->value => 'سیستم ایاب و ذهاب'
        ]
    ]
];
