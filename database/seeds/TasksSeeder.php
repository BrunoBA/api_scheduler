<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 50)->create();
    }
}
