@extends('layouts.app')
@section( 'metaTitle', 'View Employee' )
@section( 'metaDescription', 'View employee details.' )
@section( 'content' )
	<div class="container">
		<div class="clearfix pt-4 pb-2">
			<div class="float-left">
				<h2>{{ __('Employee Details') }} ({{ $employee->first_name }})</h2>
			</div>
			<div class="float-right">
				<a class="btn btn-primary" href="{{ route( 'employees', $employee->org_id ) }}" title="{{ __('All Employees')}}">
					<i class="fa fa-arrow-left"></i>
				</a>
			</div>
		</div>
		<div class="row pt-3">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('First Name') }} - </strong> {{ $employee->first_name }}
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Last Name') }} - </strong> {{ $employee->last_name }}
			</div>
		</div>
		<div class="row pt-3">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Email') }} - </strong> {{ $employee->email }}
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<strong>{{ __('Phone') }} - </strong> {{ $employee->phone }}
			</div>
		</div>
	</div>
@endsection
