<?php

namespace App\Enums;

enum InvoiceStatusEnum : string
{
    case CREATED = 'created';
    case PAID    = 'paid';
}
