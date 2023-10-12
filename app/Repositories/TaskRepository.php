<?php

namespace App\Repositories;

use App\Enum\StatusEnum;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    /**
     * @return Collection|Task[]
     */
    public function getAll(): Collection
    {
        return Task::all();
    }

    /**
     * @return Collection|Task[]
     */
    public function getAllForUser(User $user): Collection
    {
        return Task::where('user_id', $user->id)
            ->orderByDesc('id')
            ->get();
    }

    public function getTaskById($taskId): Task
    {
        return Task::findOrFail($taskId);
    }

    public function deleteTask($taskId): void
    {
        Task::destroy($taskId);
    }

    public function createTask(User $user, array $taskDetails): Task
    {
        $task = new Task();
        $task->user_id = $user->id;
        $task->fill($taskDetails);
        $task->status = StatusEnum::PENDING->value;
        $task->save();

        return $task;
    }

    public function updateTask($taskId, array $newDetails): Task
    {
        return Task::whereId($taskId)->update($newDetails);
    }
}
