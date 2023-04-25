<?php

namespace App\Http\Requests\Notification;

use App\Enums\NotificationStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class NotificationChangeStatusRequest
 *
 * @package App/Http/Requests/Notification
 *
 * @property NotificationStatusEnum $status
 *
 */

class NotificationChangeStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => ['required', Rule::enum(NotificationStatusEnum::class)]
        ];
    }
}
