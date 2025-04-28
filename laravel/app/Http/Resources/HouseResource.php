<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this -> id,
            "address" => $this -> address,
            //"owner_id" => $this -> owner_id,
            "owner" => new UserResource($this -> whenLoaded('owner')),
            "rent" => $this -> rent,
            "size" => $this -> size,
            "image" => $this -> image,
            "rooms" => $this -> rooms() -> count()
        ];
    }
}
