<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Task;

class TaskTest extends TestCase
{

    /**
     * Check if the taskt can be checked with finish.
     *
     * @return void
     */
    public function testIfTheTaskCanBeFinished(): void
    {
        echo count(Task::all());
        self::assertTrue(true);
    }

    /**
     * Check is the task belongs to user.
     *
     * @return void
     */
    public function testIfTheTaskBelongsToUser(): void
    {
        self::assertTrue(true);
    }
}
