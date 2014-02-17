<?php

class SuppliersController extends BaseController {

	public function __construct()
	{
		Session::put('curr', 'sp');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sp = Supplier::all();
        return View::make('suppliers.index', compact('sp'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('suppliers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Supplier::create(Input::all());
		return Redirect::route('suppliers.index')->with('alert.success', Alert::text('sadds'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('suppliers.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$s = Supplier::find($id);
        return View::make('suppliers.edit', compact('s'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Supplier::find($id)->update(Input::all());
		return Redirect::route('suppliers.index')->with('alert.success', Alert::text('sups'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Supplier::find($id)->delete();
		return Redirect::back()->with('alert.warning', Alert::text('sdels'));
	}

}
