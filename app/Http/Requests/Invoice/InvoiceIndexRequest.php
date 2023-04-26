<?php

namespace App\Http\Requests\Invoice;

use App\Enums\InvoiceStatusEnum;
use App\Rules\Auth\IranianMobileNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class InvoiceIndexRequest
 *
 * @package App/Http/Requests/Invoice
 *
 * @property string $status
 *
 */

class InvoiceIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => ['nullable', Rule::enum(InvoiceStatusEnum::class)]
        ];
    }
}
