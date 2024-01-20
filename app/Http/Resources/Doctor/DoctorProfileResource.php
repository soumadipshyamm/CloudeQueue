<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorProfileResource extends JsonResource
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
            'uuid' => $this->uuid,
            'dob' => $this->dob,
            'address' => $this->address,
            'blood_group' => $this->blood_group,
            'lat' => $this->lat,
            'long' => $this->long,
            'time' => $this->time,
        ];
    }
}
