<?php

namespace App\Http\Requests\Auth;

use App\Rules\Auth\IranianMobileNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class LoginRequest
 *
 * @package App/Http/Requests/Auth
 *
 * @property-read string $email
 * @property-read string $mobile
 * @property-read string $password
 */

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => ['required_without:mobile', 'email', Rule::exists('users', 'email')],
            'mobile'   => ['required_without:email', new IranianMobileNumber],
            'password' => 'required|string|min:6',
        ];
    }
}
