@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<!-- New task form -->
			<form action="{{ url('tasks') }}" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<div class="input-group">
						<!-- New task name -->
						<label for="newTaskName" class="sr-only">New Task Name</label>
						<input type="text" name="name" id="newTaskName" class="form-control" placeholder="Enter task name">
						
						<!-- Add task button -->
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Add Task</button>
						</span>
					</div>
				</div>

				<!-- Display validation errors -->
				@include('commons.errors')
			</form>			

			
			<!-- Current tasks -->
			<div class="panel panel-info">
				<div class="panel-heading">Tasks</div>

				<div class="panel-body">
					@if(count($tasks))
						<table class="table table-hover" id="taskListTable">
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($tasks as $task)
									<tr>
										<!-- Task name -->
										<td>
											@if($task->done)
												<del>{{ $task->name }}</del>
											@else
												{{ $task->name }}
											@endif
										</td>
										<td class="text-center">
											<!-- Mark as done/undone button -->
											<form class="inline" action={{ url('tasks/'.$task->id) }} method="POST">
												{{ csrf_field() }}
												{{ method_field('PATCH') }}

												@if($task->done)
													<button class="btn btn-danger" type="submit" aria-label="Undone" title="Mark as undone">
														<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												@else
													<button class="btn btn-success" type="submit" aria-label="Done" title="Mark as done">
														<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
													</button>
												@endif
											</form>											
											<!-- Delete button -->
											<form class="inline" action="{{ url('tasks/'.$task->id) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												
												<button class="btn btn-default" type="submit" aria-label="Delete" title="Delete task">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<p class="text-center">
							<span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span> You don't have any task yet. Start adding new task using the input above!
						</p>
					@endif

					{{ $tasks->links() }}
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
