<tr>
    <td>{{ $key + 1 }}</td>
    <td>
        {{ $userData->name ?? '' }}
    </td>
    <td>
        {{ $userData->email ?? '' }}
    </td>
    <td>
        {{ $userData->mobile_number ?? '' }}
    </td>
    <td>
        {{ $userData->alternative_mobile_no ?? '' }}
    </td>
    <td>
        {{ $userData->doctorProfile?->category?->name ?? '' }}
    </td>
    <td>
        <div class="action_box">
            <a href="{{route('admin.doctor.doctor.clinic', $userData->uuid)}}" class="text-primary" ><i class="fa-solid fa-house-chimney-medical"></i></a>
            <a href="{{route('admin.doctor.details', $userData->uuid)}}" class="text-primary" ><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
            <a href="{{route('admin.doctor.edit', $userData->uuid)}}" class="text-primary" data-bs-toggle="" data-bs-target=""><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" data-model="" data-uuid="{{$userData->uuid}}" data-table="users" class="text-danger deleteData"><i class="fa-regular fa-trash-can" aria-hidden="true"></i></a>
        </div>
    </td>
</tr>