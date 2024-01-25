<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalsCategory extends JsonResource
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
            'icon' => getImageURL($this->icon),
            'title' => $this->title,
            'background' => $this->background,
            'c_order' => $this->c_order,
            'parent_id' => $this->parent_id,
            'childs' => AnimalsCategory::collection($this->childs)
        ];
    }
}
