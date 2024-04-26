<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name' =>'student',
            'email' =>'student@gmail.com',
            'email_verified_at' => now(),
            'password' =>'student'
        ])->assignRole('student');


        $user=User::create([
            'name' =>'teacher',
            'email' =>'teacher@gmail.com',
            'email_verified_at' => now(),
            'password' =>'teacher'
        ])->assignRole('teacher');
    }
}
