<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Request $request): void
    {
        $roles = role::all();
        foreach ($roles as $role) {
            $faker = Faker::create();
            $user = new User();
            $user->uuid = $faker->uuid;
            $user->first_name = 'Alsaharaa';
            $user->last_name = $role->name;
            $user->username = str_replace('-', '', $role->slug);
            $user->email = str_replace('-', '.', $role->slug) . '@alsaharaa.com';
            $user->mobile_number = random_int(1000000000, 9999999999);
            $user->email_verified_at = $faker->dateTime();
            $user->mobile_number_verified_at = $faker->dateTime();
            $user->password = bcrypt('secret');
            $user->registration_ip = $request->getClientIp();
            $user->is_active = 1;
            if ($user->save()) {
                $user->profile()->create([
                    'uuid' => $faker->uuid,
                    'gender' => 'male',
                ]);
                $user->roles()->attach($role);
                if ($role->name == 'Super Admin') {
                    $permissions = permission::get();
                    $user->permissions()->sync($permissions);
                    /* Assign permission to the role */
                    $role->permissions()->sync($permissions);
                }
            }
        }
    }
}
