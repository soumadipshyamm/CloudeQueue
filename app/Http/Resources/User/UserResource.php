<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Clinic\ClinicProfileResource;
use App\Http\Resources\Doctor\DoctorProfileResource;
use App\Http\Resources\Patient\PatientProfileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->type == 'patient') {
            $type = new PatientProfileResource($this->patientProfile);
            $children = UserResource::collection($this->children);
        } elseif ($this->type == 'doctor') {
            $type = new DoctorProfileResource($this->doctorProfile);
            $children = [];
        } elseif ($this->type == 'clinic') {
            $type = new ClinicProfileResource($this->clientProfile);
            $children = [];
        }
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'alternative_mobile_no' => $this->alternative_mobile_no,
            'gender' => $this->gender,
            'type' => $this->type,
            'profile_images' => $this->profile_images,
            'is_active' => $this->is_active,
            'profile' => $type,
            'children' => $children,
        ];
    }
}
