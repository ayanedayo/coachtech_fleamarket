<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => '出品者ユーザー',
            'email' => 'seller@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => '購入者ユーザー',
            'email' => 'buyer@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
    }
}