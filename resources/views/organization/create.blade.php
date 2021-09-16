@extends('layouts.app')
@section( 'metaTitle', 'Create Organization' )
@section( 'metaDescription', 'Create a new Organization.' )
@section( 'content' )
	<div class="container">
		<div class="clearfix pt-4 pb-2">
			<div class="float-left">
				<h2>{{__( 'Add Employee' )}}</h2>
			</div>
			<div class="float-right">
				<a class="btn btn-primary" href="{{ route( 'organization.index' ) }}" title="All Organizations">
					<i class="fa fa-arrow-left"></i>
				</a>
			</div>
		</div>
		@if($errors->any())
		<div class="alert alert-danger">
			Resolve the errors to create the organization.<br/>
			<ul>
			@foreach( $errors->all() as $error )
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		<form action="{{ route( 'organization.store' ) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Name *</label>
						<input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Logo</label>
						<input type="file" name="logo" class="form-control">
						<div class="mt-1 alert alert-success">
							<p>Upload an image having 1:1 ratio and minimum width and height must be 100 pixels.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label>Website</label>
						<input type="text" name="website" class="form-control" placeholder="Website" value="{{old('website')}}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center p-3">
					<button type="submit" class="btn btn-primary">Create</button>
				</div>
			</div>
		</form>
	</div>
@endsection
