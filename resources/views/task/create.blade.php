@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Task</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create Task<a href="{{ url('/tasks') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container">
						<div class="container-page">
							<div class="col-md-12">
								{{-- <form role="form"  action="{{ url('/tasks') }}" method="POST">
									{{ csrf_field() }}
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Task Information</h2>
										<div class="form-group">
											<label>First Name: </label>
											<input class="form-control" name="fname" required="required"  placeholder="eg: Angel">
                                        </div>

										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" required="required"  name="lname" placeholder="eg: Julius">
                                        </div>

                                        <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="tel" class="form-control" required="required"  name="pnumber" placeholder="eg: +255654197534">
                                        </div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Save
											</button>
										</div>
									</div>
                                </form> --}}

                                <form role="form"  action="{{ url('/tasks') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="box box-default">
                                  <div class="box-header with-border">
                                    <h3 class="box-title">Task Information</h3>

                                    <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                                    </div>
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Create new task <span><i class="fa fa-plus"></i></span></label>
											<input type="text" class="form-control" name="task_title" required="required"  placeholder="Enter Task Title">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                          <label>Add Project Files (png,gif,jpeg,jpg,txt,pdf,doc) <span><i class="fa fa-file"></i></span></label>
                                            <input type="file" class="form-control" name="photos[]" multiple required="required">
                                        </div>

                                        <div class="form-group">
                                          <label>Task Description: <span><i class="fa fa-book"></i></span></label>
                                          <textarea class="form-control my-editor" rows="10" id="task" name="task" required="required"></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                      </div>
                                      <!-- /.col -->

                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Assign to Project <span><i class="fa fa-thumb-tack"></i></span></label>
                                          <select class="form-control select2" style="width: 100%;" required="required" name="project_id">
                                            <option value="#">--- Select Project ---</option>
                                            @foreach( $projects as $project )
                                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                          <label>Assign to: <span><i class="fa fa-user"></i></span></label>
                                          <select class="form-control select2" style="width: 100%;" required="required" id="user" name="user">
                                            <option value="#">--- Select User ---</option>
                                            @foreach ( $users as $user)
                                                <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                        <div class="form-group">
                                          <label>Select Priority <span><i class="fa fa-gavel"></i></span></label>
                                          <select class="form-control select2" style="width: 100%;" required="required" name="priority">
                                            <option value="#">--- Select Priority ---</option>
                                            <option value="0">Normal</option>
                                            <option value="1">High</option>
                                          </select>
                                        </div>
                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                        <div class="form-group">
                                          <label>Select Due Date <span><i class="fa fa-calendar"></i></span></label>
											<input class="form-control" type="date" name="duedate" required="required" id="datetimepicker1">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="btn-group">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                      </div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                  </div>
                                  <!-- /.box-body -->
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


{{-- <script>
    jQuery(document).ready(function() {

        jQuery(function() {
            jQuery('#datetimepicker1').datetimepicker( {
                defaultDate:'now',  // defaults to today
                format: 'YYYY-MM-DD hh:mm:ss',  // YEAR-MONTH-DAY hour:minute:seconds
                minDate:new Date()  // Disable previous dates, minimum is todays date
            });
        });
    });
</script> --}}
@endsection
