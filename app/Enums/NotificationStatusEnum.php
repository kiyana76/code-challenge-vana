<?php

namespace App\Enums;

enum NotificationStatusEnum : string
{
    case CREATED       = 'created';
    case QUEUED        = 'queued';
    case DELIVERED     = 'delivered';
    case NOT_DELIVERED = 'not_delivered';
}
