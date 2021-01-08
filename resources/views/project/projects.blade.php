@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<div class="col-lg-12">
	<h1 class="page-header">All Projects</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of projects
                <?php if(Auth::user()->can('create_project')){?>
                <a href="{{ url('/projects/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Project</a>
                <?php }?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body table-responsive">
				@if(!empty($projects))
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Project Name</th>
                      <th>Show</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Created Day</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $key=>$project)
                        <tr class="odd gradeX">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>
                                <a class="btn btn-info" data-toggle="modal" href='#{{ $project->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                                <div class="modal fade" id="{{ $project->id."show" }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Project Details</h4>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="center-block">
                                                    <div class="form-group">
                                                        <label>Project Name: </label>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-sm-9">
                                                    <div class="center-block">
                                                    <div class="form-group">
                                                        {{ $project->project_name }}
                                                    </div>
                                                </div>
                                                </div>
                                                </div>

                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('project.edit', [ 'id' => $project->id ]) }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                            </td>
                            <td>
                                <a href='#{{ $project->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                <div class="modal fade" id="{{ $project->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Delete</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete Project? <h9 style="color: blue;">{{ $project->project_name}}</h9>
                                            </div>
                                            <form action="/projects/{{ $project->id  }}" method="POST" role="form">

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
                            <td>{{date("F jS, Y", strtotime($project->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No Project found</strong>
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
