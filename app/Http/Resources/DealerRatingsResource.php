<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DealerRating;

class DealerRatingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rate' => $this->rate?$this->rate:0,
            'dealer_id' => $this->dealer_id,
            'user' => new UsersResource($this->user),
            'review' => $this->review?$this->review:"",
            'created_at' => $this->created_at,
            'total_rating' => number_format((float)(DealerRating::where('dealer_id', $this->dealer_id)->avg('rate')), 1),
        ];
    }
}
