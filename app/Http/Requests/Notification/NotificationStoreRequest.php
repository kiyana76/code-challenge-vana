<?php

namespace App\Http\Requests\Notification;

use App\Enums\NotificationTypeEnum;
use App\Enums\ProductableEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class NotificationStoreRequest
 *
 * @package App/Http/Requests/Notification
 *
 * @property-read integer $user_id
 * @property-read string  $status
 * @property-read string  $type
 * @property-read string  $message
 * @property-read integer $productable_id
 * @property-read string  $productable_type
 *
 */
class NotificationStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id'          => ['required', Rule::exists('users', 'id')],
            'type'             => ['required', Rule::enum(NotificationTypeEnum::class)],
            'message'          => ['required'],
            'productable_id'   => ['required'],
            'productable_type' => ['required', Rule::enum(ProductableEnum::class)]
        ];
    }
}
