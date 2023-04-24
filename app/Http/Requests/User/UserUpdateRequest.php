<?php

namespace App\Http\Requests\User;

use App\Rules\Auth\IranianMobileNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

/**
 * Class UserStoreRequest
 *
 * @package App/Http/Requests/User
 *
 * @property-read string $first_name
 * @property-read string $last_name
 * @property-read string $email
 * @property-read string $mobile
 *
 */
class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email'],
            'mobile'     => ['required', new IranianMobileNumber],
        ];
    }
}
