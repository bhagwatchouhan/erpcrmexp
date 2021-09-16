@extends('layouts.app')
@section( 'metaTitle', 'All Organizations' )
@section( 'metaDescription', 'Shows the list of all the organizations.' )
@section( 'content' )
	<div class="container">
		<div class="row">
			<div>
				<h2>Manage Organizations</h2>
			</div>
			<div class="ml-auto">
				<a class="btn btn-success" href="{{ route( 'organization.create' ) }}" title="Create Organization">
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
			<div class="col py-2 border border-right-0"><h5>Logo</h5></div>
			<div class="col py-2 border border-right-0"><h5>Name</h5></div>
			<div class="col py-2 border border-right-0"><h5>Email</h5></div>
			<div class="col py-2 border border-right-0"><h5>Website</h5></div>
			<div class="col py-2 border"><h5>Actions</h5></div>
		</div>
		@foreach( $organizations as $organization )
			<div class="row">
				<div class="col py-2 border border-right-0">
				@if(!empty($organization->logo))
					<img class="logo" src="{{ URL::to('/') }}/storage/{{ $organization->logo }}" alt="Logo" />
				@else
					<img class="logo" src="{{ URL::to('/') }}/images/avatar.png" alt="Logo" />
				@endif
				</div>
				<div class="col py-2 border border-right-0">{{ $organization->name }}</div>
				<div class="col py-2 border border-right-0">{{ $organization->email }}</div>
				<div class="col py-2 border border-right-0">{{ $organization->website }}</div>
				<div class="col py-2 border">
					<form action="{{ route( 'organization.destroy', $organization->id ) }}" method="POST">
						<a href="{{ route( 'employees', $organization->id ) }}" title="View">
							<i class="fas fa-user-tie text-success fa-lg"></i>
						</a>
						<a href="{{ route( 'organization.show', $organization->id ) }}" title="View">
							<i class="fas fa-eye text-success fa-lg"></i>
						</a>
						<a href="{{ route( 'organization.edit', $organization->id) }}">
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
    {!! $organizations->links() !!}
@endsection
