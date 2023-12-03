<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(16)
            ->sequence(
                ['name' => 'Лада Андреевна Петрова',],
                ['name' => 'Громов Аполлон Евгеньевич'],
                ['name' => 'Белоусова Александра Борисовна'],
                ['name' => 'Афанасьева Розалина Андреевна'],
                ['name' => 'Жданова Мальвина Ивановна'],
                ['name' => 'Юлиан Андреевич Попов'],
                ['name' => 'Блинова Люся Львовна'],
                ['name' => 'Власова Дина Евгеньевна'],
                ['name' => 'Виталий Львович Гордеев'],
                ['name' => 'Максим Иванович Гришин'],
                ['name' => 'Елизавета Михайловна Лепникова'],
                ['name' => 'Геннадий Петрович Шпак'],
                ['name' => 'Земцев Павел Петрович'],
                ['name' => 'Трофимов Дмитрий Евгеньевич'],
                ['name' => 'Людмила Петровна Печникова'],
                ['name' => 'Дмитрий Иванович Зуев'],
            )
            ->create();
    }
}
