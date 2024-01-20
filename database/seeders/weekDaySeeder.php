<?php

namespace Database\Seeders;

use App\Models\weekDays;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class weekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json  = file_get_contents(database_path() . '/data/weekDays.json');
        $data  = json_decode($json);
        foreach ($data->weekDays as $key => $value) {
            $weekDays = new weekDays();
            $weekDays->name = $value->name;
            $weekDays->save();
        }
    }
}
