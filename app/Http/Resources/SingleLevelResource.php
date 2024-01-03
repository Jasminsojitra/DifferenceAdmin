<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SingleLevelResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->image,
            'image2' => $this->image2,
            'points' => PointResource::collection($this->points),
            'coins' => (int)Auth::user()->coins,
            'solved' => (int)Auth::user()->solved,
        ];
    }
}
