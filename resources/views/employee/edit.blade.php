@extends('layouts.app')
@section( 'metaTitle', 'Update Employee' )
@section( 'metaDescription', 'Update an existing Employee.' )
@section( 'content' )
	<div class="container">
		<div class="clearfix pt-4 pb-2">
			<div class="float-left">
				<h2>Update Employee</h2>
			</div>
			<div class="float-right">
				<a class="btn btn-primary" href="{{ route( 'employees', $employee->org_id ) }}" title="All Employees">
					<i class="fa fa-arrow-left"></i>
				</a>
			</div>
		</div>
		@if($errors->any())
		<div class="alert alert-danger">
			Resolve the errors to update the Employee.<br/>
			<ul>
			@foreach( $errors->all() as $error )
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		<form action="{{ route( 'employee.update', $employee->id ) }}" method="POST">
			{{ method_field('PUT') }}
			@csrf
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>First Name *</label>
						<input type="text" name="first_name" class="form-control" placeholder="Name" value="{{$employee->first_name}}">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Last Name *</label>
						<input type="text" name="last_name" class="form-control" placeholder="Name" value="{{$employee->last_name}}">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" value="{{$employee->email}}">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$employee->phone}}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center p-3">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	</div>
@endsection
