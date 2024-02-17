<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 = admin
        User::firstOrCreate([
            'name' => 'John Doe',
            'email' => 'admin1@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('qweqweqwe'),
        ]);

        User::firstOrCreate([
            'name' => 'Patrick Star',
            'email' => 'admin2@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('qweqweqwe'),
        ]);


        // 2 = staff
        User::firstOrCreate([
            'name' => 'Bart Simpson',
            'email' => 'staff1@gmail.com',
            'is_admin' => 2,
            'password' => Hash::make('qweqweqwe'),
        ]);

        User::firstOrCreate([
            'name' => 'Rick Sanchez',
            'email' => 'staff2@gmail.com',
            'is_admin' => 2,
            'password' => Hash::make('qweqweqwe'),
        ]);

        // 3 = Rider
        User::firstOrCreate([
            'name' => 'Eric Caratao',
            'email' => 'rider1@gmail.com',
            'is_admin' => 3,
            'password' => Hash::make('qweqweqwe'),
        ]);

        User::firstOrCreate([
            'name' => 'HJ Miranda',
            'email' => 'rider2@gmail.com',
            'is_admin' => 3,
            'password' => Hash::make('qweqweqwe'),
        ]);
    }
}
