<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

readonly class DeveloperService
{
    public function list(array $includes): Collection
    {
        return Developer::with($includes)->get();
    }

    public function find(int $id, array $includes): ?Developer
    {
        return Developer::with($includes)->find($id);
    }

    public function create(array $data): Developer
    {
        return Developer::create($data);
    }

    public function update(Developer $developer, array $data): Developer
    {
        $developer->update($data);

        return $developer;
    }

    public function delete(Developer $developer): void
    {
        $developer->delete();
    }
}
