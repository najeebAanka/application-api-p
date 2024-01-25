<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppStarter extends JsonResource
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
            'image' => getImageURL($this->image),
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
