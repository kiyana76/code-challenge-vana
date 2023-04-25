<?php

use App\Enums\NotificationTypeEnum;

return [
    'price' => [
        NotificationTypeEnum::SMS->value   => '1200',
        NotificationTypeEnum::EMAIL->value => '600',
    ]
];
