@extends('layouts.app')

@section('title', 'Add Purchase Order')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Purchase Order</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create purchase order<a href="{{ url('/purchase/order') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/purchase/order') }}" method="POST">
									{{ csrf_field() }}
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Purchase Order Information</h2>
										<div class="form-group">
											<label>Purchase Order Name: </label>
											<input class="form-control" type="text" name="purchase_name" required="required"  placeholder="Enter Purchase Order Name">
                                        </div>

										<div class="form-group">
											<label>Purchase Order Value</label>
											<input class="form-control" type="text" required="required"  name="purchase_value" placeholder="Enter Purchase Order Value">
                                        </div>

                                        <div class="form-group">
                                                <label>Client Name</label>
                                                <input type="text" class="form-control" required="required"  name="client_name" placeholder="Enter Client Name">
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
