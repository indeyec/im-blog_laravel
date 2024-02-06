<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('admin.categories.index',[
            'categories'=> Category::paginate(10)
        ]);
    }

   
    public function create()
    {
        return view('admin.categories.create');
    }

  
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

   
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

   
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();

    return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
