@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<div class="col-lg-12">
	<h1 class="page-header">All Tasks</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of tasks
                <?php if(Auth::user()->can('create_task')){?>
                <a href="{{ url('/tasks/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Task</a>
                <?php }?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body table-responsive">
				@if(!empty($tasks))
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Task Title</th>
                      <th>Assigned To/Project</th>
                      <th>Priority </th>
                      <th>Status</th>
                      {{--  <th>Show</th>
                      <th>Edit</th>  --}}
                      <th>Delete</th>
                      <th>Created Day</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $key=>$task)
                        <tr class="odd gradeX">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $task->task_title }}</td>
                            <td>
                                @foreach( $users as $user)
                                    @if ( $user->id == $task->user_id )
                                        <a href="">{{ $user->first_name }}</a>
                                    @endif
                                @endforeach
                                <span class="label label-warning"><strong>{{ $task->project->project_name }}</strong></span>
                            </td>
                            <td>
                                @if ( $task->priority == 0 )
                                <span class="label label-info">Normal</span>
                                @else
                                    <span class="label label-danger">High</span>
                                @endif
                            </td>
                            <td>
                                @if ( !$task->completed )
                                <a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-warning"> Mark as completed</a>
                                <span class="label label-danger">{{ ( $task->duedate < Carbon\Carbon::now() )  ? "!" : "" }}</span>
                                @else
                                    <span class="label label-success">Completed</span>
                                @endif
                            </td>
                            {{--  <td>
                                <a href="{{ route('task.view', ['id' => $task->id]) }}" type="button" class="btn btn-primary"><i class="fa fa-eye" arial-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('task.edit', [ 'id' => $task->id ]) }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                            </td>  --}}
                            <td>
                                <a href='#{{ $task->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                <div class="modal fade" id="{{ $task->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Delete</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete Task? <h9 style="color: blue;">{{ $task->task_title}}</h9>
                                            </div>
                                            <form action="/tasks/{{ $task->id  }}" method="POST" role="form">

                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>

                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{date("F jS, Y", strtotime($task->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No Task found</strong>
				</div>
				@endif
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

</section>
<!-- /.row -->

@endsection
