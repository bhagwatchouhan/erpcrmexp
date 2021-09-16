@extends('layouts.app')
@section( 'metaTitle', 'View Organization' )
@section( 'metaDescription', 'View organization details.' )
@section( 'content' )
	<div class="container">
		<div class="clearfix pt-4 pb-2">
			<div class="float-left">
				<h2>{{ __('Organization Details') }} ({{ $organization->name }})</h2>
			</div>
			<div class="float-right">
				<a class="btn btn-primary" href="{{ route( 'organization.index' ) }}" title="{{ __('All Organizations')}}">
					<i class="fa fa-arrow-left"></i>
				</a>
			</div>
		</div>
		<div class="row pt-3">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Name') }} - </strong> {{ $organization->name }}
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Logo') }} - </strong>
				@if(!empty($organization->logo))
					<img class="logo" src="{{ URL::to('/') }}/storage/{{ $organization->logo }}" alt="Logo" />
				@else
					<img class="logo" src="{{ URL::to('/') }}/images/avatar.png" alt="Logo" />
				@endif
			</div>
		</div>
		<div class="row pt-3">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Email') }} - </strong> {{ $organization->email }}
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Website') }} - </strong> {{ $organization->website }}
			</div>
		</div>
	</div>
@endsection
