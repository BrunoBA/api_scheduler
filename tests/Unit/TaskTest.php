<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Task;
use App\User;

class TaskTest extends TestCase
{
    // use RefreshDatabase;
    use DatabaseTransactions;

    private $task;
    private const USER_ID = 1;

    protected function setUp ():void  {
        parent::setUp();
        $this->task = factory(Task::class)->create(['user_id' => self::USER_ID]);
    }

    /**
     * Check is the task belongs to user.
     *
     * @return void
     */
    public function testIfTheTaskBelongsToUser(): void
    {
        $user = factory(User::class)->make(['id' => self::USER_ID]);
        self::assertTrue(true, $this->task->belongsToUser($user->id));
    }

    /**
     * Check if the task can be checked with finish.
     *
     * @return void
     */
    public function testIfTheTaskCanBeFinished(): void
    {
        $this->task = factory(Task::class)->create(['user_id' => self::USER_ID]);
        $this->task->finish()->save();
        self::assertTrue($this->task->isFinished());
    }

    /**
     * Check if the task can't be remove.
     *
     * @return void
     */
    public function testIfTheTaskCantBeDeleted(): void
    {
        self::assertFalse($this->task->remove());
    }
}
