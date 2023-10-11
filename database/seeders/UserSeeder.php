<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\ForeignKey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        ForeignKey::disable();
        User::truncate();

        User::factory()->create([
            'name' => 'Joe',
            'email' => 'joe@example.com',
            'password' => Hash::make('secret'),
        ]);

        User::factory()->create([
            'name' => 'Jane',
            'email' => 'jane@example.com',
            'password' => Hash::make('secret'),
        ]);

        ForeignKey::enable();
    }
}
