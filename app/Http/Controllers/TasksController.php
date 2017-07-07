<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;

class TasksController extends Controller
{
	/**
	 * The task repository instance.
	 *
	 * @var TaskRepository
	 */
	protected $tasks;

	/**
	 * Create a new controller instance.
	 *
	 * @param TaskRepository $tasks
	 * @return void
	 */
	public function __construct(TaskRepository $tasks)
	{
		$this->middleware('auth');

		$this->tasks = $tasks;
	}

	/**
	 * Display a list of all of the user's task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('tasks.index', [
			'tasks' => $this->tasks->getByUser($request->user())
		]);
	}

	/**
	 * Create a new task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:255'
		]);

		$request->user()->tasks()->create([
			'name' => $request->name
		]);

		return back();
	}

	/**
	 * Destroy the given task.
	 * 
	 * @param Request $request
	 * @param Task $task
	 * @return Response
	 */
	public function destroy(Request $request, Task $task)
	{
		$this->authorize('destroy', $task);

		$task->delete();

		return back();
	}

	/**
	 * Toggle task's done status.
	 * 
	 * @param Request $request
	 * @param Task $task
	 * @return Response
	 */
	public function toggleDoneStatus(Request $request, Task $task)
	{
		$this->authorize('toggleDoneStatus', $task);

		$task->done = !$task->done;
		$task->save();

		return back();
	}
}
