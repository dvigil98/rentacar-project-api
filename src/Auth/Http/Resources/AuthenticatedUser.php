<?php

namespace Src\Auth\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role' => [
                'id' => $this->role->id,
                'name' => $this->role->name
            ],
            'name' => $this->name,
            'email' => $this->email,
            'active' => $this->active
        ];
    }
}
