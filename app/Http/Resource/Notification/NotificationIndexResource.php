<?php

namespace App\Http\Resource\Notification;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class NotificationIndexResource
 *
 * @package App\Http\Resource\Notification
 *
 * @mixin Notification
 */
class NotificationIndexResource extends JsonResource
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
            'id' => $this->id,

            'user_id' => $this->user_id,

            'type'           => $this->type,
            'type_translate' => $this->type_translate,

            'status'           => $this->status,
            'status_translate' => $this->status_translate,

            'message' => $this->message,
            'price'   => $this->price,

            'productable_id'             => $this->productable_id,
            'productable_type'           => $this->productable_type,
            'productable_type_translate' => $this->productable_type_translate,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return $response;
    }
}
