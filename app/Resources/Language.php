<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'direction' => $this->direction,
            'is_default' => $this->is_default,
        ];
    }
}
