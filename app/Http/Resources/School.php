<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class School extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'regNumber' => $this->regNumber,
            'level' => $this->level,
            'region' => $this->region,
            'district' => $this->ward,
            'dateStarted' => $this->dateStarted,
            'schoolType' => $this->schoolType,
            'genderOrientation' => $this->genderOrientation,
            'ownership' => $this->ownership,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
