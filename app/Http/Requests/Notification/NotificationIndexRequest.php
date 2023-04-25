<?php

namespace App\Http\Requests\Notification;

use App\Enums\NotificationStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class NotificationIndexRequest
 *
 * @package App/Http/Requests/Notification
 *
 * @property NotificationStatusEnum $status
 *
 */

class NotificationIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
