<?php

namespace App\Http\Requests\User;

use App\Rules\Auth\IranianMobileNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class LoginRequest
 *
 * @package App/Http/Requests/User
 *
 */

class UserIndexRequest extends FormRequest
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
