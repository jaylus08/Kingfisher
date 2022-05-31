<?php

namespace App\Http\Controllers\Publication\EIC;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('publication.eic.categories.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publication.eic.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $category = new Category();
        $category->name = Str::lower($request->name);
        $category->status = 1;
        $category->save();

        return redirect('publication/eic/category')->with('success', 'category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('publication.eic.categories.edit', compact('category'));
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
        $this->validate($request,[
            'name'=>'required',

        ]);

        $category = Category::find($id);
        $category->name = Str::lower($request->name);
        $category->save();

        return redirect('publication/eic/category')->with('success', 'category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect('publication/eic/category')->with('success', "category deleted"); 
    }

    public function status($id){
        $category = Category::find($id);
        if($category->status === 1){
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->save();

        return redirect('publication/eic/category')->with('success', 'category status changed');
    }
}
