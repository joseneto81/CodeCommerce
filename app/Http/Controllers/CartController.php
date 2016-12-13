<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Cart;
use CodeCommerce\Product;


class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if(!Session::has('cart'))
        {
            Session::set('cart', $this->cart);
        }

        return view("store.cart", ['cart' => Session::get('cart')]);
    }

    public function add($id, Request $request)
    {
        if(isset($form_data))
           $form_data = $request->all();
        else
           $form_data['qtd'] = 1;

        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($product->id, $product->name, $product->price, $form_data['qtd']);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    private function getCart()
    {
        if(Session::has('cart'))
        {
            $cart = Session::get('cart');
        }
        else
        {
            $cart = $this->cart;
        }
        return $cart;
    }

    public function update(Request $request)
    {
        $form_data = $request->all();

        $cart = $this->getCart();

        $product = Product::find($form_data['id']);
        $cart->update($product->id, $form_data['qtd']);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

}
