<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InvoiceChangeStatusRequest
 *
 * @package App/Http/Requests/Invoice
 *
 */

class InvoiceChangeStatusRequest extends FormRequest
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
