<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->paginate(10);
        //$products = $this->products->all();

        return view('products.index', compact("products"));
        //return view('admin.products', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductRequest $request)
    {
        //dd($request->all());

        $form_data = $request->all();
        $product = $this->products->fill($form_data);
        $product->save();

        return redirect()->route("products.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Show: $id->name";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');
        $product = $this->products->find($id);
        return view("products.edit", compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = $request->all();

        //tratamento dos checkbox
        if(!isset($form_data['featured']))
            $form_data['featured'] = false;
        if(!isset($form_data['recommend']))
            $form_data['recommend'] = false;

        $this->products->find($id)->update($form_data);
        return redirect()->route("products.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->products->find($id)->delete();
        return redirect()->route("products.index");
    }

    //tratamento das imagens
    public function images($id)
    {
        $product = $this->products->find($id);

        return view("products.images", compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->products->find($id);

        return view("products.create_image", compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        //gravando os dados referentes a imagem no banco
        $image = ProductImage::create(['product_id'=>$id, 'extension'=> $extension]);

        //gravando a imagem no disco
        Storage::disk("public_local")->put($image->id.".".$extension, File::get($file));

        return redirect()->route("products.images", ['id'=>$id]);

    }

    public function destroyImage($id, ProductImage $productImage)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path()."/uploads/".$image->id.".".$image->extension))
        {
            Storage::disk('public_local')->delete($image->id.".".$image->extension);
        }

        $product = $image->product; //apenas para redirecionar para o produto

        $image->delete(); //apagar registro da tabela

        return redirect()->route("products.images", ['id'=>$product->id]);
    }
}