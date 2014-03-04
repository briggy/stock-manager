<?php

class WebController extends BaseController {

	
	public function getIndex()
	{
		$products = Product::random()->get();
		$active = 'home';
		return View::make('web.index', compact('products', 'active'));
	}

	public function getAbout()
	{
		$active = 'about';
		return View::make('web.about', ['head_title'=>'About Annas Electrical Supply', 'active'=>$active]);
	}

	public function getComments()
	{
		$active = 'comment';
		return View::make('web.comment', ['head_title'=>'Comments ', 'active'=>$active]);
	}

	public function getGallery()
	{
		$active = 'gallery';
		return View::make('web.gallery', ['head_title'=>'Photo Gallery', 'active'=>$active]);
	}

	public function getChat()
	{
		$active = 'chat';
		return View::make('web.chat', ['head_title'=>'Chat with Us!', 'active'=>$active]);
	}

	public function getProducts($cat_id = null)
	{
		$categs = Categ::with('subs.products', 'products')->parent()->orderBy('name', 'asc')->get();

		if($cat_id):
			$products = Product::where('categ_id', $cat_id)->get();
			$cat = Categ::find($cat_id);
		else:
			$products = Product::get();
		endif;

		$active = 'products';
		$head_title = 'Products'. ($cat_id ? ' | '. $cat->name : '');

		return View::make('web.products', compact('head_title', 'active', 'categs', 'products'));
	}

	public function getCheckout()
	{

		$cart = Session::get('cart', ['']);
		$products = Product::whereIn('id', $cart)->get();
		$head_title = 'Checkout Items';
		$active = 'home';
		return View::make('web.checkout', compact('products', 'head_title', 'active'));
	}

	public function getSuccessCheckout()
	{
		Session::forget('cart');
		return View::make('web.successCheckout',['active'=>'home']);
	}


	public function postCart()
	{
		if(Input::has('id')):
			$id = Input::get('id');
			Session::push('cart', $id);
			$product = Product::find($id);
		endif;

		$cart = Session::get('cart');
		$products = Product::whereIn('id', $cart)->get();
		$hide_qty = true;

		return View::make('web.cart', compact('cart', 'products', 'hide_qty'));
	}

	public function postVoidItem()
	{
		$new_cart = array_diff(Session::get('cart'), [Input::get('value')]);
		Session::put('cart', $new_cart);
		return Session::all();
	}

	public function putFinalCheckout()
	{
		$data = [
			'date'=>date('Y-m-d'),
			'total_cost'=>Input::get('total_cost'),
			'type'=>'sales'
		];
		
		$inv = Inventory::create($data);

		foreach (Input::get('qty') as $p_id => $qty) {
			$p = Product::find($p_id);

			$t = [
				'product_id'=>$p_id,
				'inventory_id'=>$inv->id,
				'qty'=>$qty,
				'remaining'=>$p->qty()-$qty,
				'cost'=>$p->cost,
				'price'=>$p->price,
				'total'=>$qty*$p->price
			];

			Transaction::create($t);
		}

		return Redirect::to('web/success-checkout');
	}

}
