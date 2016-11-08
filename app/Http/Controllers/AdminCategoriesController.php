<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class AdminCategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = $this->categories->all();
        $categories = $this->categories->paginate(10);

        return view('categories.index', compact("categories"));


        //$categories = Category::all(); dd($categories);
        //**return view('admin.categories', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryRequest $request)
    {
        $form_data = $request->all();
        $category = $this->categories->fill($form_data);
        $category->save();

        return redirect()->route("categories.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Category $category, $x)
    {
        $categories = $category->lists('name','id');

        dd($categories);

        return "Show: name";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categories->find($id);
        return view("categories.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->categories->find($id)->update($request->all());
        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->categories->find($id)->delete();
        return redirect()->route("categories.index");
    }
}
