<?php

namespace App\Enums;

enum NotificationTypeEnum : string
{
    case EMAIL  = 'email';
    case SMS    = 'sms';
}
