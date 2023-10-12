<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $this->taskRepository->createTask($user, $request->validated());

        return redirect(route('tasks.index'))
            ->with('success', __('Task created!'));
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
