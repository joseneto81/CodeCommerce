<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class CheckoutController extends Controller
{
    public function __construct()
    {
        //verifica se o usuario esta logado antes de executar qualquer metodo. com isto voce garante que o usuario esta autenticado
        //*$this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if(!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');


        if($cart->getTotal() > 0)
        {
            //salvando os items da ordem de servico
            //$order = $orderModel->create(['user_id'=>1, 'total'=>$cart->getTotal()]);
            $order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]); //utilizando autenticacao


            foreach($cart->all() as $id=>$item)
            {
                $order->items()->create(['product_id'=>$id, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }

            $cart->clear(); //limpar carrinho


            //dd($order);
            return redirect()->route('store.orders');
        }
    }
}
