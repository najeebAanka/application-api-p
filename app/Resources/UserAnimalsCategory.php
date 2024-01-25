<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Voyager;

class UserAnimalsCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $v = new Voyager();


        return [
            'id' => $this->id,
            'icon' => getImageURL($this->icon),
            'title' => $this->title,
            'background' => $this->background,
        ];
    }

}
