<?php

namespace Database\Seeders;

use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function __construct(UserRepository $userRepository)
     {
         $this->userRepository = $userRepository;
     }

    public function run()
    {
        $users = [
            [
                'name' => 'Muhammad Arifan L',
                'email' => 'arifmuhammad.idn@gmail.com',
                'password' => bcrypt('polinema2022'),
            ],
            [
                'name' => 'Muhammad Arifan L',
                'email' => 'alfianita.fauzia@gmail.com',
                'password' => bcrypt('polinema2022'),
            ]
        ];

        foreach ($users as $user) {
            $this->userRepository->create($user);
        }
    }
}
