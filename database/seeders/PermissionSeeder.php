<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json  = file_get_contents(database_path() . '/data/permission.json');
        $data  = json_decode($json);
        foreach ($data->permissions as $key => $value) {
            permission::updateOrCreate([
                'name' => $value->name,
            ]);
        }
    }
}
