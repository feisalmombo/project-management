@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Project</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit project<a href="{{ url('/projects') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ route('project.update', [ 'id' => $edit_project->id ]) }}" method="POST">
                                    {{ csrf_field() }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Edit Project Information</h2>
										<div class="form-group">
											<label>Project Name: </label>
											<input class="form-control" id="project" name="name" required="required" value="{{ $edit_project->project_name }}">
                                        </div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Save
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
