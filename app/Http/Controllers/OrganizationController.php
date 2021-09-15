<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
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
	public function index()
	{
		$organizations = Organization::latest()->paginate( 10 );

		return view( 'organization.index', compact( 'organizations' ) )
			->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 10 );
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view( 'organization.create' );
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
			'name' => 'required|max:200',
			'email' => 'email|nullable|max:250',
			'logo' => 'nullable|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=100,min_height=100,ratio=1',
			'website' => 'url|nullable|max:1024'
		]);

		$fileName = null;

		if( !empty( $request->logo ) )
		{
			$fileName = time() . '.' . $request->logo->extension();

			$request->logo->move( storage_path( 'app/public' ), $fileName );
		}

		$organization = new Organization([
			'name' => $request->get('name'),
			'email'=> $request->get('email'),
			'logo'=> $fileName,
			'website'=> $request->get('website')
		]);

		$organization->save();

		return redirect()->route( 'organization.index' )
			->with( 'success', 'Organization created successfully.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view( 'organization.show', compact( 'organization' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
		return view( 'organization.edit', compact( 'organization' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
		$request->validate([
			'name' => 'required|max:200',
			'email' => 'email|nullable|max:250',
			'logo' => 'nullable|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=100,min_height=100,ratio=1',
			'website' => 'url|nullable|max:1024'
		]);

		$fileName = null;

		if( !empty( $request->logo ) )
		{
			$fileName = time() . '.' . $request->logo->extension();

			$request->logo->move( storage_path( 'app/public' ), $fileName );

			if( !empty( $organization->logo ) )
			{
				unlink( storage_path( 'app/public' ) . "/{$organization->logo}" );
			}
		}

		$organization->name = $request->get( 'name' );
		$organization->email = $request->get( 'email' );
		$organization->logo = $fileName;
		$organization->website = $request->get( 'website' );

		$organization->update();

		return redirect()->route( 'organization.index' )
			->with( 'success', 'Organization updated successfully.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
		$organization->delete();

		return redirect()->route( 'organization.index' )
			->with( 'success', 'Organization deleted successfully.' );
    }
}
