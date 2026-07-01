<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

readonly class TaskService
{
    public function list(array $includes): Collection
    {
        return Task::with($includes)->get();
    }

    public function find(int $id, array $includes): ?Task
    {
        return Task::with($includes)->find($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);

        return $task;
    }

    public function delete(Task $task): void
    {
        $task->delete();
    }
}
