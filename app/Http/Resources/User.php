<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'player' => [
                'id'           => $this->id,
                'name'         => $this->name,
                'display_name' => $this->display_name,
                'email'        => $this->email,
                'role'         => $this->role,
                'wins'         => $this->wins,
                'updated_at'   => $this->updated_at->diffForHumans(),
        ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }

}
