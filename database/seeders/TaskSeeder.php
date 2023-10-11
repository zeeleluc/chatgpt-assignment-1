<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Services\ForeignKey;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        ForeignKey::disable();
        Task::truncate();

        Task::factory()->times(20)->create();

        ForeignKey::enable();
    }
}
