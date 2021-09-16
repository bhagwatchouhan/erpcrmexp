<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use App\Models\Organization;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index( $oid )
	{
		$organization = Organization::find( $oid );

		$employees = Employee::latest()->where( "org_id", "=", $oid )->paginate( 10 );

		return view( 'employee.index', compact( 'employees', 'organization' ) )
			->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 10 );
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $oid )
    {
		return view( 'employee.create', compact( 'oid' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'org_id' => 'required|max:200',
			'first_name' => 'required|max:200',
			'last_name' => 'required|max:200',
			'email' => 'email|nullable|max:250',
			'phone' => 'numeric|nullable|min:1000000000|max:9999999999'
		]);

		$employee = new Employee([
			'org_id' => $request->get('org_id'),
			'first_name' => $request->get('first_name'),
			'last_name'=> $request->get('last_name'),
			'email'=> $request->get('email'),
			'phone'=> $request->get('phone')
		]);

		$employee->save();

		return redirect()->route( 'employees', $request->get('org_id') )
			->with( 'success', 'Employee created successfully.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view( 'employee.show', compact( 'employee' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
		return view( 'employee.edit', compact( 'employee' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
		$request->validate([
			'first_name' => 'required|max:200',
			'last_name' => 'required|max:200',
			'email' => 'email|nullable|max:250',
			'phone' => 'numeric|nullable|min:1000000000|max:9999999999'
		]);

		$employee->first_name	= $request->get('first_name');
		$employee->last_name	= $request->get('last_name');

		$employee->email	= $request->get('email');
		$employee->phone	= $request->get('phone');

		$employee->update();

		return redirect()->route( 'employees', $employee->org_id )
			->with( 'success', 'Employee updated successfully.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
		$employee->delete();

		return redirect()->route( 'employees', $employee->org_id )
			->with( 'success', 'Employee deleted successfully.' );
    }
}
