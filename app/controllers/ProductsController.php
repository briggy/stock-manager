<?php

class ProductsController extends BaseController {

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

		$prds = Product::with('categ')->orderBy('name', 'asc')->get();
        return View::make('products.index', compact('prds'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$v = Validator::make(Input::all(), array('file|image'));

		if($v->fails()) return Redirect::back()->withErrors($v)->withInput();

		$p = Product::create(Input::all());
		
		if(Input::hasFile('file')){
			Input::file('file')->move('uploads', 'product_'.$p->id.'.jpg');
		}

		return Redirect::route('products.index')->with('alert.success', Alert::text('saddp'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('products.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$p = Product::find($id);
        return View::make('products.edit', compact('p'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$v = Validator::make(Input::all(), array('file|image'));

		if($v->fails()) return Redirect::back()->withErrors($v)->withInput();

		$p = Product::find($id)->update(Input::all());

		if(Input::hasFile('file')){

			Input::file('file')->move('uploads', 'product_'.$id.'.jpg');

		}

		return Redirect::route('products.index')->with('alert.success', Alert::text('supp'));
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::find($id)->delete();
		return Redirect::back()->with('alert.success', Alert::text('sdelp'));
	}

}
