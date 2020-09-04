<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
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
            'indexNumber' => $this->indexNumber,
            'level' => $this->level,
            'dateStarted' => $this->dateStarted,
            'dateFinished' => $this->dateFinished,
            'school_id' => $this->schoolId,
            'user_id' => $this->userId,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
