<?php

namespace App\Http\Resource\Invoice;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class InvoiceIndexResource
 *
 * @package App\Http\Resource\Invoice
 *
 * @mixin Invoice
 */
class InvoiceIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'id'               => $this->id,
            'user_id'          => $this->user_id,
            'user_email'       => $this->user_email,
            'user_mobile'      => $this->user_mobile,
            'price'            => $this->price,
            'tax'              => $this->tax,
            'discount'         => $this->discount,
            'discount_code'    => $this->discount_code,
            'total'            => $this->total,
            'status'           => $this->status,
            'status_translate' => $this->status_translate
        ];

        return $response;
    }
}
