<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
// use App\Imports\CategoryImportClass;
// use Maatwebsite\Excel\Facades\Excel;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect('/category')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($request->all());

        return redirect('/category')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/category')->with('success', 'Category deleted successfully.');
    }

    // public function import()
    // {
    //     Excel::import(new CategoryImportClass, request()->file('csv_file'));
    //     return back();
    //     // Optionally, you can redirect or add a success message here
    // }
}
