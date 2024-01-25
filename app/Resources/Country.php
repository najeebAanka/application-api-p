<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource
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
            'flag' => asset('flags/'.$this->co_code.'.png'),
            'co_code' => $this->co_code,
            'slug' => $this->slug,
            'name' => $this->name,
            'ph_code' => $this->ph_code,
            'currency_code' => $this->currency_code,
            'cities' => $this->cities
        ];
    }
}
