<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(3);
        return view('blogui.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogui.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
       // dd($request->all());


         $request->validate([
        'name' => 'required|string|min:3|max:30',
        'icon'=>'required|image|mimes:png,jpg'
    ]);

    //Category::create($request->all());
    $category=Category::create([
        'name'=>request('name'),

    ]);
    if(request()->hasFile('icon')){
        $icon=request()->file('icon')->getClientOriginalName();
        $icon= $category->id. '_'. $icon;
        request()->file('icon')->storeAs(env('FILESYSTEM_DRIVER').'icons/','icon');
    }

    $category->update([
       'icon'=>$icon,
    ]);

    //return view('blogui.user.index')->with('success','Usercreated successfully.');
   return redirect()->route('categories.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('blogui.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('blogui.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|numeric|min:0|max:1',

        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('categories.index')->with('success','Category deleted successfully.');
    }
}
