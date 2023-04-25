<?php

namespace App\Http\Requests\Invoice;

use App\Rules\Auth\IranianMobileNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class InvoiceShowRequest
 *
 * @package App/Http/Requests/Invoice
 *
 */

class InvoiceShowRequest extends FormRequest
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
