<?php

class CategsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		Session::put('curr', 'pr');
	}

	public function index()
	{
		$cats = Categ::with('subs', 'parent')->get();
        return View::make('categs.index', compact('cats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('categs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$input = Input::get('parent_id') ? Input::all() : Input::except('parent_id');
		Categ::create($input);
		return Redirect::route('categs.index')->with('alert.success', Alert::text('saddc'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('categs.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c = Categ::find($id);
        return View::make('categs.edit', compact('c'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::get('parent_id') ? Input::all() : Input::except('parent_id');
		Categ::find($id)->update($input);
		return Redirect::route('categs.index')->with('alert.success', Alert::text('supc'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Categ::find($id)->delete();
		return Redirect::back()->with('alert.warning', Alert::text('sdelc'));

	}

}
