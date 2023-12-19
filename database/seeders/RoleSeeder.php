<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json  = file_get_contents(database_path() . '/data/roles.json');
        $data  = json_decode($json);
        foreach ($data->roles as $key => $value) {
            role::updateOrCreate([
                'name' => $value->name,
                // 'slug' => $value->slug,
            ]);
        }
    }
}
