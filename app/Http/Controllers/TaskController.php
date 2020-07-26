<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        if ($groupBy = $request->get('groupBy')) {
            $tasks = auth()->user()->all_tasks->groupBy($groupBy);
        } else {
            $tasks = auth()->user()->all_tasks;
        }
        return view('tasks.index', compact('tasks', 'groupBy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $task = $request->user()->tasks()->create($request->all());
        if($request->filled('user_id')) {
            $task->user_id = $request->input('user_id');
            $task->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|Response|View
     */
    public function edit(Task $task): View
    {
        return \view('tasks.modals.editTaskModal', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->authorize('update', $task);
        $task->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
    }
}
