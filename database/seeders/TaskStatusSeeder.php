<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_statuses')->insert([
            [
                'name' => 'новый',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'в работе',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'на тестировании',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'завершен',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
