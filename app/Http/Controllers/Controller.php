<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class Controller
{
    protected function parseIncludes(Request $request, array $allowed): array
    {
        $requested = array_filter(explode(',', $request->query('include', '')));

        return array_values(array_intersect($requested, $allowed));
    }

    protected function notFound(string $detail): JsonResponse
    {
        return response()->json([
            'errors' => [
                [
                    'status' => '404',
                    'title'  => 'Not Found',
                    'detail' => $detail,
                ],
            ],
        ], 404);
    }
}
