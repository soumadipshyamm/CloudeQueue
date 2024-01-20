<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json  = file_get_contents(database_path() . '/data/category.json');
        $data  = json_decode($json);
        foreach ($data->categorys as $key => $value) {
            $categorys = new Category();
            $categorys->name = $value->name;
            $categorys->save();
        }
    }
}
