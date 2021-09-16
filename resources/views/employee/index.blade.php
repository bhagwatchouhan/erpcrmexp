@extends('layouts.app')
@section( 'metaTitle', 'All Employees' )
@section( 'metaDescription', 'Shows the list of all the employees.' )
@section( 'content' )
	<div class="container">
		<div class="row">
			<div>
				<h2>Manage Employees ({{$organization->name}})</h2>
			</div>
			<div class="ml-auto">
				<a class="btn btn-success" href="{{ route( 'addemployee', $organization->id ) }}" title="Create Employee">
					<i class="fas fa-plus"></i>
				</a>
			</div>
		</div>
		@if( $message = Session::get( 'success' ) )
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		<div class="row text-2xl">
			<div class="col py-2 border border-right-0"><h5>First Name</h5></div>
			<div class="col py-2 border border-right-0"><h5>Last Name</h5></div>
			<div class="col py-2 border border-right-0"><h5>Email</h5></div>
			<div class="col py-2 border border-right-0"><h5>Phone</h5></div>
			<div class="col py-2 border"><h5>Actions</h5></div>
		</div>
		@foreach( $employees as $employee )
			<div class="row">
				<div class="col py-2 border border-right-0">{{ $employee->first_name }}</div>
				<div class="col py-2 border border-right-0">{{ $employee->last_name }}</div>
				<div class="col py-2 border border-right-0">{{ $employee->email }}</div>
				<div class="col py-2 border border-right-0">{{ $employee->phone }}</div>
				<div class="col py-2 border">
					<form action="{{ route( 'employee.destroy', $employee->id ) }}" method="POST">
						<a href="{{ route( 'employee.show', $employee->id ) }}" title="View">
							<i class="fas fa-eye text-success fa-lg"></i>
						</a>
						<a href="{{ route( 'employee.edit', $employee->id) }}">
							<i class="fas fa-edit fa-lg"></i>
						</a>
						@csrf
						@method( 'DELETE' )
						<button type="submit" title="Delete" style="border: none; background-color:transparent;" onclick="return confirm('Are you sure you want to delete the selected row?')">
							<i class="fas fa-trash fa-lg text-danger"></i>
						</button>
					</form>
				</div>
			</div>
		@endforeach
	</div>
    {!! $employees->links() !!}
@endsection
