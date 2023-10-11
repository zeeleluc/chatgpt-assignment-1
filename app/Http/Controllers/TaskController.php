<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(): View
    {
        $user = auth()->user();

        return view('tasks.index', [
            'tasks' => $this->taskRepository->getAllForUser($user)
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        //
    }

    public function show(Request $request): JsonResponse
    {
        //
    }

    public function update(Request $request): JsonResponse
    {
        //
    }

    public function destroy(Request $request): JsonResponse
    {
        //
    }
}
