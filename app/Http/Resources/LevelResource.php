<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LevelResource extends JsonResource
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
            // 'status' => Auth::user()->levels->where('level_id',$this->id)->first() ? Auth::user()->levels->where('level_id',$this->id)->first()->status : 0,( $this->id == Category::find($this->category_id)->levels()->first()->id ? 1 :0 )
            'status' => (Auth::user()->levels->where('level_id',$this->id)->first()) ? Auth::user()->levels->where('level_id',$this->id)->first()->status  : ( $this->id == Category::find($this->category_id)->levels()->first()->id ? 1 :0 ),

        ];
    }
}
