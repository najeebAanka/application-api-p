<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Voyager;

class User extends JsonResource
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
            'personal_picture' => $v->image($this->personal_picture),
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'phone_verified_at' => $this->phone_verified_at,
            'email_verified_at' => $this->email_verified_at,
            'categories' => UserAnimalsCategory::collection($this->categories),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

}
