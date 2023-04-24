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
 * @property-read string $password
 * @property-read string $password_confirmation
 *
 */
class UserStoreRequest extends FormRequest
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
            'email'      => ['required', 'email', Rule::unique('users', 'email')],
            'mobile'     => ['required', Rule::unique('users', 'mobile'), new IranianMobileNumber],
            'password'   => ['required', 'confirmed', Password::min(8)->mixedCase()]
        ];
    }
}
