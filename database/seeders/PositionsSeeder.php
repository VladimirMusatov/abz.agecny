<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
use Carbon\Carbon;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'id' => 1,
            'name' => 'Системный администратор',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
        ]);

        Position::create([
            'id' => 2,
            'name' => 'Генеральный директор',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
        ]);

        Position::create([
            'id' => 3,
            'name' => 'Программист',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
        ]);

        Position::create([
            'id' => 4,
            'name' => 'HR-менеджер',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
        ]);

        Position::create([
            'id' => 5,
            'name' => 'Тимлид ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'admin_created_id' => 1,
            'admin_updated_id' => 1,
        ]);
    }
}
