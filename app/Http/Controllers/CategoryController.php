<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
         return view('categories.index', ['categories'=>$categories]);
    }

    /**
     * Store a newly created category in storage.

     */
    public function store(Request $request)
    {
        $category =  Category::create([
            'title'=>$request->title,
        ]);
        $category->save();
       
        return redirect()->route('categories.index')
        ->with('success','Category created successfully.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
          ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')
      ->with('success', 'Category updated successfully.');
    }
  public function create()
  {
    return view('categories.create');
  }
  /**
   * Display the specified category.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $category = Category::find($id);
    return view('categories.show', compact('category'));
  }
  /**
   * Show the form for editing the specified category.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $category = Category::find($id);
    return view('categories.edit', compact('category'));
  }
    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')
      ->with('success', 'Category deleted.');
    }
}
