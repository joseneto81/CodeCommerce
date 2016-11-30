<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller
{

    public function index()
    {
        //*local correto para esta implementacao, é na Model
        //*$pFeatured = Product::where("featured","=","1")->get();//retorna um array com todos os registros da condicao

        $pFeatured = Product::featured()->get();//retorna um array com todos os registros da condicao

        $pRecommend = Product::recommend()->get();//retorna um array com todos os registros da condicao

        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);

        $products = Product::ofCategory($id)->get();
        //$products = Product::all();

        return view('store.category', compact('categories', 'products', 'category'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories', 'product'));
    }

    public function tag($tag_id)
    {
        $categories = Category::all();
        $tag = Tag::find($tag_id);
        $products = $tag->products->all();
        //dd($products);
        return view('store.tag', compact('categories','tag', 'products'));
    }
}
