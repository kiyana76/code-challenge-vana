<?php

namespace App\Http\Resource\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserShowResource
 *
 * @package App\Http\Resources\Panel\User
 *
 * @mixin User
 */
class UserShowResource extends JsonResource
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

            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'mobile'     => $this->mobile,
            'email'      => $this->email,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return $response;
    }
}
